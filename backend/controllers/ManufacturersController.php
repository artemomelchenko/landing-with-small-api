<?php

namespace backend\controllers;

use Yii;
use common\models\Manufacturers;
use common\models\ManufacturersSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ManufacturersController implements the CRUD actions for Manufacturers model.
 */
class ManufacturersController extends Controller
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
                        'allow' => true,
                        'actions' => ['index','view','update','delete','create'],
                        'roles' => ['@',],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Manufacturers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManufacturersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manufacturers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Manufacturers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Manufacturers();
     if ($model->load(Yii::$app->request->post())) {

        $image = UploadedFile::getInstance($model, 'img');
//            VarDumper::dump($image,10,1);
        if (!is_null($image)) {
            $ext = end((explode(".", $image->name)));
            $avatar = Yii::$app->security->generateRandomString().".{$ext}";
            Yii::$app->params['uploadPath'] = Yii::getAlias('@frontend').'/web/img/manufacturers/' . $avatar;
            $path = Yii::$app->params['uploadPath'];
            $image->saveAs($path);
            $model->img = $avatar;
        }
        if ($model->save()) {
//            VarDumper::dump($model,10,1);
            return $this->redirect(['view', 'id' => $model->id]);
        }

    }
//
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Manufacturers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_img = $model->img;

        if ($model->load(Yii::$app->request->post())) {

            $image = UploadedFile::getInstance($model, 'img');
            if (is_null($image)){
                $model->img = $old_img;
            }else{
                $ext = end((explode(".", $image->name)));
                $avatar = Yii::$app->security->generateRandomString().".{$ext}";
                Yii::$app->params['uploadPath'] = Yii::getAlias('@frontend').'/web/img/manufacturers/' . $avatar;
                $path = Yii::$app->params['uploadPath'];
                $image->saveAs($path);
                $model->img = $avatar;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }  else {
                VarDumper::dump($model->getErrors()); die();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Manufacturers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manufacturers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Manufacturers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Manufacturers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
