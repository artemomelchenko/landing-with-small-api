<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%colors_items}}".
 *
 * @property int $colors_id
 * @property int $items_id
 *
 * @property Colors $colors
 * @property Items $items
 */
class ColorsItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%colors_items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['colors_id', 'items_id'], 'required'],
            [['colors_id', 'items_id'], 'integer'],
            [['colors_id', 'items_id'], 'unique', 'targetAttribute' => ['colors_id', 'items_id']],
            [['colors_id'], 'exist', 'skipOnError' => true, 'targetClass' => Colors::className(), 'targetAttribute' => ['colors_id' => 'id']],
            [['items_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['items_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'colors_id' => Yii::t('app', 'Colors ID'),
            'items_id' => Yii::t('app', 'Items ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColors()
    {
        return $this->hasOne(Colors::className(), ['id' => 'colors_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'items_id']);
    }
}
