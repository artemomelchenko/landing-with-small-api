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

                $items_img->id_color = $colors[$k]->id;
                $items_img->id_item = $item_id;
//                VarDumper::dump($items_img,10,1);
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
                $items_settings->id_manufacturer = $manufacturers[$key]->id;
                $items_settings->save();
            }
        }
    }
}
