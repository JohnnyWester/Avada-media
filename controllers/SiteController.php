<?php

namespace app\controllers;

use app\models\Comment;
use app\models\CommentForm;
use app\models\ImageUpload;
use app\models\Movies;
use app\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $movies = Movies::getMovieForSlider();
        $last = Movies::getLastMovie();
        $latest = Movies::getLatestMovie();


        return $this->render('index', [
            'movies' => $movies,
            'last' => $last,
            'latest' => $latest
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        return $this->render('contact', [
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $data = News::getAll(2);
        return $this->render('about', [
            'news' => $data['news'],
            'pagination' => $data['pagination'],
        ]);
    }

    public function actionSingle($id)
    {
        $movies = Movies::findOne($id);
        $movies->viewedCounter();
        return $this->render('single', [
            'movies' => $movies
        ]);
    }

    public function actionReviews()
    {
        $data = Movies::getAll(8);
        return $this->render('reviews', [
            'movies' => $data['movies'],
            'pagination' => $data['pagination'],
        ]);
    }

    public function actionSingleNews($id)
    {
        $news = News::findOne($id);
        $news->viewedCounter();

        return $this->render('single-news', [
            'news' => $news,
        ]);
    }
}
