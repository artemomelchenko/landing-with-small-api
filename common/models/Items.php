<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property string $length
 * @property string $height
 * @property string $full_weight
 * @property string $weight
 * @property int $id_categories
 *
 * @property ColorsItems[] $colorsItems
 * @property Colors[] $colors
 * @property Categories $categories
 * @property ItemsSettings[] $itemsSettings
 * @property ManufacturersItems[] $manufacturersItems
 * @property Manufacturers[] $manufacturers
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_categories'], 'required'],
            [['id_categories'], 'integer'],
            [['name', 'length', 'height', 'full_weight', 'weight'], 'string', 'max' => 255],
            [['id_categories'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id_categories' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'length' => Yii::t('app', 'Length'),
            'height' => Yii::t('app', 'Height'),
            'full_weight' => Yii::t('app', 'Full Weight'),
            'weight' => Yii::t('app', 'Weight'),
            'id_categories' => Yii::t('app', 'Id Categories'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColorsItems()
    {
        return $this->hasMany(ColorsItems::className(), ['items_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemsImg()
    {
        return $this->hasMany(ItemsImg::className(), ['id_item' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColors()
    {
        return $this->hasMany(Colors::className(), ['id' => 'colors_id'])->viaTable('colors_items', ['items_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'id_categories']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemsSettings()
    {
        return $this->hasMany(ItemsSettings::className(), ['id_item' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturersItems()
    {
        return $this->hasMany(ManufacturersItems::className(), ['items_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasMany(Manufacturers::className(), ['id' => 'manufacturers_id'])->viaTable('manufacturers_items', ['items_id' => 'id']);
    }

    public function allSaving(array $array, array $colors, array $manufacturers, $id_category)
    {

        $item = new Items();

        $item->name = $array['Items']['name'];
        $item->length = $array['Items']['length'];
        $item->height = $array['Items']['height'];
        $item->full_weight = $array['Items']['full_weight'];
        $item->weight = $array['Items']['weight'];
        $item->id_categories = $id_category;
        $item->save();

        $item_id = $item->id;

        foreach ($array['Colors']['boolean'] as $k => $color)
        {
            
            if ((int)$color == 1)
            {

                $items_img = new ItemsImg();

                $uploadedFile = $_FILES;
                if(is_uploaded_file($_FILES["ItemsImg"]["tmp_name"]['img'][$k]))
                {

                    $uploadedFileName = $uploadedFile['ItemsImg']['name']['img'][$k];
                    $ext = end((explode(".", $uploadedFileName)));
                    $uploadedFileBeginningName = Yii::$app->security->generateRandomString() . ".{$ext}";
                    Yii::$app->params['uploadPath'] = Yii::getAlias('@frontend') . '/web/img/items/' . $uploadedFileBeginningName;
                    $path = Yii::$app->params['uploadPath'];
                    move_uploaded_file($_FILES["ItemsImg"]["tmp_name"]['img'][$k], $path);

                    $items_img->img = $uploadedFileBeginningName;
                }
                $items_img->id_color = $colors[$k-1]->id;
                $items_img->id_item = $item_id;
                $items_img->save();
            }
        }

        foreach ($array['ItemsSettings']['zinс'] as $key => $setting)
        {

            if (!empty($setting) ||
                !empty($array['ItemsSettings']['zinс'][$key]) ||
                !empty($array['ItemsSettings']['price'][$key]) ||
                !empty($array['ItemsSettings']['garanty'][$key]) ||
                (int)$array['ItemsSettings']['premium'][$key] == 1)
            {

                $items_settings = new ItemsSettings();

                $items_settings->zinс = $setting;
                $items_settings->price = $array['ItemsSettings']['price'][$key];
                $items_settings->garanty = $array['ItemsSettings']['garanty'][$key];
                $items_settings->premium = $array['ItemsSettings']['premium'][$key];

                if ($array['ItemsSettings']['premium'][$key] == 1)
                {

                    $items_settings->premium_text = $array['ItemsSettings']['premium_text'][$key];
                }

                $items_settings->id_item = $item_id;
                $items_settings->id_manufacturer = $key;
                $items_settings->save();
            }
        }

        return $item_id;
    }

    public static function outputDataForUpdateImgs($id, $colors)
    {

        $itemsImg = [];

        foreach ($colors as $key => $color)
        {

            $old = ItemsImg::find()->where(['id_item' => $id, 'id_color' => $color->id])->one();

            if ((int)$color->id == $old->id_color)
            {

                $itemsImg[] = $old;
                $color['boolean'] = [$color->id => 1];
            }else{

                $itemsImg[] = new ItemsImg();
                $color['boolean'] = [$color->id => 0];
            }
        }

        return $itemsImg;
    }

    public static function outputDataForUpdateManufacturers($id, $manufacturers)
    {

        $itemsSettings = [];

        foreach ($manufacturers as $k => $manufacturer)
        {

            $old = ItemsSettings::find()->where(['id_item' => $id, 'id_manufacturer' => $manufacturer->id])->one();

            if ((int)$manufacturer->id == $old->id_manufacturer)
            {

                $itemsSettings[$k] = $old;
                $itemsSettings[$k]->price = [$old->id_manufacturer => $old->price];
                $itemsSettings[$k]->zinс = [$old->id_manufacturer => $old->zinс];
                $itemsSettings[$k]->garanty = [$old->id_manufacturer => $old->garanty];
                $itemsSettings[$k]->premium = [$old->id_manufacturer => $old->premium];
                $itemsSettings[$k]->premium_text = [$old->id_manufacturer => $old->premium_text];
            }else{

                $itemsSettings[$k] = new ItemsSettings();
                $itemsSettings[$k]->price = [$manufacturer->id => $itemsSettings[$k]->price];
                $itemsSettings[$k]->zinс = [$manufacturer->id => $itemsSettings[$k]->zinс];
                $itemsSettings[$k]->garanty = [$manufacturer->id => $itemsSettings[$k]->garanty];
                $itemsSettings[$k]->premium = [$manufacturer->id => $itemsSettings[$k]->premium];
                $itemsSettings[$k]->premium_text = [$manufacturer->id => $itemsSettings[$k]->premium_text];
            }
        }

        return $itemsSettings;
    }

    public static function allUpdating(array $array, array $colors, array $manufacturers, $item, $itemsImg, $itemsSettings)
    {

        $item->name = $array['Items']['name'];
        $item->length = $array['Items']['length'];
        $item->height = $array['Items']['height'];
        $item->full_weight = $array['Items']['full_weight'];
        $item->weight = $array['Items']['weight'];
        $item->save();

        $item_id = $item->id;

        foreach ($array['Colors']['boolean'] as $k => $color)
        {

            if ((int)$color == 1 && (int)$colors[$k-1]['boolean'][$k] == 1)
            {

                $items_img = $itemsImg[$k-1];

                $uploadedFile = $_FILES;

                if (is_null($uploadedFile))
                {

                    $items_img->img = $itemsImg[$k-1]->img;

                }elseif(is_uploaded_file($uploadedFile["ItemsImg"]["tmp_name"]['img'][$k]))
                {

                    $uploadedFileName = $uploadedFile['ItemsImg']['name']['img'][$k];
                    $ext = end((explode(".", $uploadedFileName)));
                    $uploadedFileBeginningName = Yii::$app->security->generateRandomString() . ".{$ext}";
                    Yii::$app->params['uploadPath'] = Yii::getAlias('@frontend') . '/web/img/items/' . $uploadedFileBeginningName;
                    $path = Yii::$app->params['uploadPath'];
                    move_uploaded_file($_FILES["ItemsImg"]["tmp_name"]['img'][$k], $path);

                    $items_img->img = $uploadedFileBeginningName;
                }

                $items_img->id_color = (int)$colors[$k-1]->id;
                $items_img->id_item = $item_id;
                $items_img->save();

            }elseif ((int)$color == 1 && (int)$colors[$k-1]['boolean'][$k] == 0)
            {

                $items_img = $itemsImg[$k-1];

                $uploadedFile = $_FILES;

                if(is_uploaded_file($uploadedFile["ItemsImg"]["tmp_name"]['img'][$k]))
                {

                    $uploadedFileName = $uploadedFile['ItemsImg']['name']['img'][$k];
                    $ext = end((explode(".", $uploadedFileName)));
                    $uploadedFileBeginningName = Yii::$app->security->generateRandomString() . ".{$ext}";
                    Yii::$app->params['uploadPath'] = Yii::getAlias('@frontend') . '/web/img/items/' . $uploadedFileBeginningName;
                    $path = Yii::$app->params['uploadPath'];
                    move_uploaded_file($_FILES["ItemsImg"]["tmp_name"]['img'][$k], $path);

                    $items_img->img = $uploadedFileBeginningName;
                }

                $items_img->id_color = (int)$colors[$k-1]->id;
                $items_img->id_item = $item_id;
                $items_img->save();

            }elseif ((int)$color == 0 && (int)$colors[$k-1]['boolean'][$k] == 1)
            {

                $items_img = $itemsImg[$k - 1];
                $items_img->delete();
            }
        }

        foreach ($array['ItemsSettings']['zinс'] as $key => $setting)
        {

            if (!empty($setting) ||
                !empty($array['ItemsSettings']['zinс'][$key]) ||
                !empty($array['ItemsSettings']['price'][$key]) ||
                !empty($array['ItemsSettings']['garanty'][$key]) ||
                (int)$array['ItemsSettings']['premium'][$key] == 1)
            {
                if (!empty($itemsSettings[$key-1]->price[$key]) ||
                    !empty($itemsSettings[$key-1]->zinc[$key]) ||
                    !empty($itemsSettings[$key-1]->garanty[$key]) ||
                    (int)$itemsSettings[$key-1]->premium[$key] == 1){

                    $items_settings = $itemsSettings[$key-1];
                }else{

                    $items_settings = new ItemsSettings();
                }
                $items_settings->zinс = $setting;
                $items_settings->price = $array['ItemsSettings']['price'][$key];
                $items_settings->garanty = $array['ItemsSettings']['garanty'][$key];
                $items_settings->premium = (int)$array['ItemsSettings']['premium'][$key];

                if ($array['ItemsSettings']['premium'][$key] == 1)
                {

                    $items_settings->premium_text = $array['ItemsSettings']['premium_text'][$key];
                }else{
                    $items_settings->premium_text = null;
                }
                $items_settings->id_item = $item_id;
                $items_settings->id_manufacturer = $key;

                $items_settings->save();

            }else{

                $items_settings = $itemsSettings[$key-1];
                $items_settings->delete();
            }
        }
    }
}
