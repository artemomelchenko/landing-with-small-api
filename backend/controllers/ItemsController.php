<?php

namespace backend\controllers;
use common\models\Categories;
use common\models\CategoriesSearch;
use common\models\Colors;
use common\models\ItemsImg;
use common\models\ItemsSettings;
use common\models\Manufacturers;
use Yii;
use common\models\Items;
use common\models\ItemsSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view', 'index', 'create', 'update', 'delete', 'item'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['api'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchItems =  new CategoriesSearch();
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviders = $searchItems->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchItems' => $searchItems,
            'dataProviders' => $dataProviders,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($category_id, $id)
    {

        $model = Items::find()
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
            ->where(['id' => $id])
            ->one();

//            VarDumper::dump($model,10,1);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionItem($id)
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->searches(Yii::$app->request->queryParams, $id);
//        VarDumper::dump($dataProvider,10,1);
        return $this->render('item', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Items();

        $colors = Colors::find()->all();
        $manufacturers = Manufacturers::find()->all();

        $itemsSettings = [];
        $itemsImg = [];

        foreach ($colors as $color)
        {

            $itemsImg[] = new ItemsImg();
        }

        foreach ($manufacturers as $manufacturer)
        {

            $itemsSettings[] = new ItemsSettings();
        }

        $post = Yii::$app->request->post();

        if ($post)
        {

            $item_id = $model->allSaving($post, $colors, $manufacturers, $id);

            return $this->redirect([
                'view',
                'category_id' => $id,
                'id' => $item_id
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'colors' => $colors,
            'manufacturers' => $manufacturers,
            'itemsSettings' => $itemsSettings,
            'itemsImg' => $itemsImg,
        ]);
    }

    public function actionApi($id){

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $result = Categories::getApi($id);

        return $result;
    }

    /**
     * Updates an existing Items model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $colors = Colors::find()->all();
        $manufacturers = Manufacturers::find()->all();

        $itemsImg = Items::outputDataForUpdateImgs($id, $colors);
        $itemsSettings = Items::outputDataForUpdateManufacturers($id, $manufacturers);

        $post = Yii::$app->request->post();

        if ($post)
        {

            Items::allUpdating($post, $colors, $manufacturers, $model, $itemsImg, $itemsSettings);

            return $this->redirect([
                'view',
                'category_id' => $model->id_categories,
                'id' => $model->id
            ]);
        }

        return $this->render('update', [
            'model' => $model,
            'colors' => $colors,
            'manufacturers' => $manufacturers,
            'itemsSettings' => $itemsSettings,
            'itemsImg' => $itemsImg,
        ]);
    }

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $id_category = $model->id_categories;

        $model->delete();

        return $this->redirect(['item', 'id' => $id_category]);
    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
