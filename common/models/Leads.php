<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Leads".
 *
 * @property int $id
 * @property string $form_name
 * @property string $name
 * @property string $phone
 *
 * @property LeadsSettings $leadsSettings
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Leads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_name', 'phone'], 'required'],
            [['form_name', 'name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'form_name' => Yii::t('app', 'Form Name'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }
    public function getLeadsSettings()
    {
        return $this->hasOne(LeadsSettings::className(), ['leads_id' => 'id']);
    }
}
