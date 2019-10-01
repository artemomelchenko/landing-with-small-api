<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property int $id
 * @property string $name
 * @property string $hex
 *
 * @property ColorsItem[] $colorsItems
 * @property Item[] $items
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hex'], 'required'],
            [['name', 'hex'], 'string', 'max' => 255],
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
            'hex' => Yii::t('app', 'Hex'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColorsItems()
    {
        return $this->hasMany(ColorsItem::className(), ['colors_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id' => 'items_id'])->viaTable('colors_items', ['colors_id' => 'id']);
    }
}
