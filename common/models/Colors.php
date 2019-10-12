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
 * @property ColorsItems[] $colorsItems
 * @property Items[] $items
 */
class Colors extends \yii\db\ActiveRecord
{

    public $boolean;

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
            'boolean' => Yii::t('app', 'Booleans'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['id' => 'items_id'])->viaTable('colors_items', ['colors_id' => 'id']);
    }
}
