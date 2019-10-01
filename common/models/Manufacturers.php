<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Manufacturers".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 */
class Manufacturers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Manufacturers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['name', 'img'], 'string', 'max' => 255],
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
            'img' => Yii::t('app', 'Img'),
        ];
    }
}
