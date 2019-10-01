<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items_settings".
 *
 * @property int $id
 * @property string $price
 * @property string $garanty
 * @property string $zinс
 * @property int $premium
 * @property string $premium_text
 * @property int $id_manufacturer
 * @property int $id_item
 *
 * @property Item $item
 */
class ItemsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['premium', 'id_manufacturer', 'id_item'], 'required'],
            [['premium', 'id_manufacturer', 'id_item'], 'integer'],
            [['price', 'garanty', 'zinс', 'premium_text'], 'string', 'max' => 255],
            [['id_item'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['id_item' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'price' => Yii::t('app', 'Price'),
            'garanty' => Yii::t('app', 'Garanty'),
            'zinс' => Yii::t('app', 'Zinс'),
            'premium' => Yii::t('app', 'Premium'),
            'premium_text' => Yii::t('app', 'Premium Text'),
            'id_manufacturer' => Yii::t('app', 'Id Manufacturer'),
            'id_item' => Yii::t('app', 'Id Item'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'id_item']);
    }
}
