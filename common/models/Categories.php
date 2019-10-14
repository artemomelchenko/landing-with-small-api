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

        foreach ($categories['items'] as $item)
        {

            $result['id'] = $categories['id'];
            $result['type'] = $categories['name'];
            $result['name'] = $item['name'];
            $result['price'] = $item['price'];
            $result['garanty'] = $item['garanty'];


            foreach ($item['itemsImg'] as $value)
            {

                $result['colorSlider'][] =
                    [
                        'img' => $value['img'],
                        'color' => $value['color']['hex'],
                        'colorName' => $value['color']['name']
                    ];
            }

            foreach ($item['itemsSettings'] as $itemsSetting)
            {

                $result['description'][] =
                    [
                        'name' => $itemsSetting['manufacturer']['name'],
                        'brandsImages' => $itemsSetting['manufacturer']['img'],
                        'price' => $itemsSetting['price'],
                        'propertys' => [
                            'zinc' => $itemsSetting['zinс'],
                            'length' => $item['length'],
                            'height' => $item['height'],
                            'full_weight' => $item['full_weight'],
                            'weight' => $item['weight'],
                            'garanty' => $itemsSetting['garanty'],
                            'premium' => $itemsSetting['premium'],
                            'premium_text' => $itemsSetting['premium_text'],
                        ]
                    ];
            }
        }
        VarDumper::dump($result,10,1);
        return $result;
    }
}
