<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;
use yii\rbac\Item;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 *
 * @property Item[] $items
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['id_categories' => 'id']);
    }

    public static function getApi($id)
    {

        $categories = Categories::find()
            ->with(['items' => function ($query)
            {

                $query
                    ->with(['itemsImg' => function($query)
                    {

                        $query
                            ->with('color')
                            ->all();
                    }])
                    ->with(['itemsSettings' => function($query)
                    {

                        $query
                            ->with('manufacturer')
                            ->all();
                    }])
                    ->all();
            }])
            ->where(['id' => $id])
            ->asArray()
            ->one();

        $result = [];

        foreach ($categories['items'] as $key => $item)
        {

            $result[$key]['id'] = $categories['id'];
            $result[$key]['type'] = $categories['name'];
            $result[$key]['name'] = $item['name'];
//            $result[$key]['price'] = $item['price'];
//            $result[$key]['garanty'] = $item['garanty'];


            foreach ($item['itemsImg'] as $value)
            {

                $result[$key]['colorSlider'][] =
                    [
                        'img' => $value['img'],
                        'color' => $value['color']['hex'],
                        'colorName' => $value['color']['name']
                    ];
            }

            if (empty($item['itemsSettings'])){
                $result[$key]['description'][] =
                    [
                        'price' => $item['price'],
                        'propertys' => [
//                            ['name' => 'Вміст цинку', 'value' => $itemsSetting['zinс']],
                            ['name' => 'Довжина', 'value' => $item['length']],
                            ['name' => 'Висота', 'value' => $item['height']],
                            ['name' => 'Повна ширина', 'value' => $item['full_weight']],
                            ['name' => 'Корисна ширина', 'value' => $item['weight']],
                            ['name' => 'Гарантія', 'value' => $item['garanty']],
//                            'premium' => $itemsSetting['premium'],
//                            'premium_text' => $itemsSetting['premium_text'],
                        ]
                    ];
            }else{
                foreach ($item['itemsSettings'] as $itemsSetting)
                {

                    $result[$key]['description'][] =
                        [
                            'name' => $itemsSetting['manufacturer']['name'],
                            'brandsImages' => $itemsSetting['manufacturer']['img'],
                            'price' => $itemsSetting['price'],
                            'propertys' => [
                                ['name' => 'Вміст цинку', 'value' => $itemsSetting['zinс']],
                                ['name' => 'Довжина', 'value' => $item['length']],
                                ['name' => 'Висота', 'value' => $item['height']],
                                ['name' => 'Повна ширина', 'value' => $item['full_weight']],
                                ['name' => 'Корисна ширина', 'value' => $item['weight']],
                                ['name' => 'Гарантія', 'value' => $itemsSetting['garanty']],
                                'premium' => $itemsSetting['premium'],
                                'premium_text' => $itemsSetting['premium_text'],
                            ]
                        ];
                }
            }
        }
        return $result;
    }
}
