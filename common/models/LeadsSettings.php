<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leads_settings".
 *
 * @property int $id
 * @property int $leads_id
 * @property string $manufacturer
 * @property string $thickness
 * @property string $square
 * @property string $comment
 *
 * @property Leads $leads
 */
class LeadsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['leads_id'], 'required'],
            [['leads_id'], 'integer'],
            [['manufacturer', 'thickness', 'square', 'comment'], 'string', 'max' => 255],
            [['leads_id'], 'exist', 'skipOnError' => true, 'targetClass' => Leads::className(), 'targetAttribute' => ['leads_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'leads_id' => Yii::t('app', 'Leads ID'),
            'manufacturer' => Yii::t('app', 'Manufacturer'),
            'thickness' => Yii::t('app', 'Thickness'),
            'square' => Yii::t('app', 'Square'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeads()
    {
        return $this->hasOne(Leads::className(), ['id' => 'leads_id']);
    }
}
