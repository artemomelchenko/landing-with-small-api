<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%items_img}}".
 *
 * @property int $id
 * @property string $img
 * @property int $id_color
 * @property int $id_item
 *
 * @property Colors $color
 * @property Items $item
 */
class ItemsImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%items_img}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_color', 'id_item'], 'required'],
            [['id_color', 'id_item'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['img'], 'safe'],
            [['id_color'], 'exist', 'skipOnError' => true, 'targetClass' => Colors::className(), 'targetAttribute' => ['id_color' => 'id']],
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
            'img' => Yii::t('app', 'Img'),
            'id_color' => Yii::t('app', 'Id Color'),
            'id_item' => Yii::t('app', 'Id Item'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Colors::className(), ['id' => 'id_color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'id_item']);
    }
}
