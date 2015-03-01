<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use app\models\File;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access'    => [
                'class' => AccessControl::className(),
                'only'  => ['update', 'delete', 'create', 'DeleteTmb'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new NewsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{

            $news = News::find()->where('active = 1')->orderBy('create_at DESC')->all();

            return $this->render('index_public', ['news' => $news]);

        }
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $model->active = true;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->saveUploadFile($model);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeletetmb($id = null){
        if(is_null($id)){
            echo 'Name file not given';
            return false;
        }

        $model = News::findOne($id);
        $tmb = Yii::getAlias('@webroot').'/upload/news/'.$model->thumb;
        if(file_exists($tmb)){
            unlink($tmb);
            $model->thumb = null;
            $model->save();
            echo 'Файл удален';
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $this->saveUploadFile($model);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveUploadFile($model)
    {
        $uploadFile = UploadedFile::getInstance($model, 'file');

        if(!$uploadFile){
            return;
        }
        $tmbName        = Yii::$app->security->generateRandomString(10);
        $tmbPath        = 'upload/news/'.$tmbName.'.'.$uploadFile->extension;
        if($uploadFile->saveAs($tmbPath)){
            $model->thumb = $tmbName.'.'.$uploadFile->extension;
            $model->save();
        }
    }
}
