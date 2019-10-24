<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "leads".
 *
 * @property int $id
 * @property string $form_name
 * @property string $name
 * @property string $phone
 * @property string $date_create
 *
 * @property LeadsSettings[] $leadsSettings
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_name', 'phone', 'date_create'], 'required'],
            [['date_create'], 'safe'],
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
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadsSettings()
    {
        return $this->hasOne(LeadsSettings::className(), ['leads_id' => 'id']);
    }
    public static function sendToTelegram(array $arr){

        $token ='698566873:AAH29686LePlwWf4nkCWA-h883KhKp5uGow';
        $chat_id = '-361536928';

        $txt = '';
        foreach ($arr as $key => $value) {
            $txt .= "<b>" . $key . "</b> " . $value."%0A";

        };
//            $txt = 'Ім\'я-'.$key['name'].':Номер телефону-'.$key['phone'].':Назва форми-'.$key['forma'];



     return $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
    }
    public static function sendEmail(array $arr){
        return Yii::$app->mailer->compose([
            'html' => 'message',
            'text' => 'message',

        ],$arr)
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([Yii::$app->params['adminEmail'] => 'test'])
            ->setSubject('Заявка')
//            ->setTextBody($a)
            ->send();
    }
    public static function actionPdf(){
        $filePath = '/web/files/sss.pdf';
        $filename = 'sss.pdf';
        $completePath = Yii::getAlias('@frontend'.$filePath);

        return Yii::$app->response->sendFile($completePath, 'sss.pdf');
    }


}
