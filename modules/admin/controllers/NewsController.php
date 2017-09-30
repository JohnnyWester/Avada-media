<?php

namespace app\modules\admin\controllers;

use app\models\ImageUpload;
use app\models\MoviesSearch;
use app\models\News;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Default controller for the `admin` module
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        $news = News::find()->all();
        $searchModel = new MoviesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'news' => $news,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreate()
    {
        $model = new News();
        $image = new ImageUpload;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $file = UploadedFile::getInstance($image, 'image');

            $model->saveImage($image->uploadFile($file));

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'image' => $image
            ]);
         }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new ImageUpload;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $file = UploadedFile::getInstance($image, 'image');
            $model->saveImage($image->updateImage($file, $model->image));
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'image' => $image
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index',]);
    }
}
