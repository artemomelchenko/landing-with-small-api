<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%manufacturers_items}}".
 *
 * @property int $manufacturers_id
 * @property int $items_id
 *
 * @property Items $items
 * @property Manufacturers $manufacturers
 */
class ManufacturersItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%manufacturers_items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manufacturers_id', 'items_id'], 'required'],
            [['manufacturers_id', 'items_id'], 'integer'],
            [['manufacturers_id', 'items_id'], 'unique', 'targetAttribute' => ['manufacturers_id', 'items_id']],
            [['items_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['items_id' => 'id']],
            [['manufacturers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturers::className(), 'targetAttribute' => ['manufacturers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manufacturers_id' => Yii::t('app', 'Manufacturers ID'),
            'items_id' => Yii::t('app', 'Items ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'items_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasOne(Manufacturers::className(), ['id' => 'manufacturers_id']);
    }
}
