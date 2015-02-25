<?php

namespace app\controllers;

use Yii;
use app\models\Media;
use app\models\MediaSearch;
use app\models\File;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * MediaController implements the CRUD actions for Media model.
 */
class MediaController extends Controller
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
                'only'  => ['index', 'update', 'delete', 'create'],
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
     * Lists all Media models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Media model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $media = $this->findModel($id);
        return $this->render('view', [
            'model' => $media
        ]);
    }

    /**
     * Creates a new Media model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Media();
        $model->active = true;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploads = UploadedFile::getInstances($model, 'file');
            foreach($uploads as $file){

                $name = 'upload/media/'.Yii::$app->security->generateRandomString().'.'.$file->extension;

                $dbFile             = new File();
                $dbFile->fid        = $model->id;
                $dbFile->type       = $model->getFileType();
                $dbFile->path       = $name;
                $dbFile->extension  = $file->extension;
                if($dbFile->save()){
                    $file->saveAs($name);
                }
                unset($dbFile);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Media model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploads = UploadedFile::getInstances($model, 'file');
            foreach($uploads as $file){

                $name = 'upload/media/'.Yii::$app->security->generateRandomString().'.'.$file->extension;

                $dbFile             = new File();
                $dbFile->fid        = $model->id;
                $dbFile->type       = $model->getFileType();
                $dbFile->path       = $name;
                $dbFile->extension  = $file->extension;
                if($dbFile->save()){
                    $file->saveAs($name);
                }
                unset($dbFile);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Media model.
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
     * Finds the Media model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Media the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPhoto()
    {
        $models = Media::find()->with(['files'])->where('mediatype_id = 1')->orderBy('create_at DESC')->all();

        return $this->render('photo', [
            'models'    => $models
        ]);
    }

    public function actionVideo()
    {
        $models = Media::find()->with(['files'])->where('mediatype_id = 2')->orderBy('create_at DESC')->all();

        return $this->render('video', [
            'models'    => $models
        ]);
    }
}
