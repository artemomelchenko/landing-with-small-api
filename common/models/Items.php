<?php

namespace common\models;

use Yii;

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
}
