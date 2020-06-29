<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\NewsForm;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $news = NewsForm::find()->all();
        $preusers = User::find()->asArray()->all();
        $users = ArrayHelper::index($preusers,'id');
        $query = NewsForm::find();
        $countQuery = clone $query;

        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'defaultPageSize' => 5
        ]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('news', compact('models', 'users', 'pages'));
    }


//    public function actionNews()
//    {
//        $news = NewsForm::find()->all();
//        $preusers = User::find()->asArray()->all();
//        $users = ArrayHelper::index($preusers,'id');
//        $query = NewsForm::find();
//        $countQuery = clone $query;
//
//        $pages = new Pagination([
//            'totalCount' => $countQuery->count(),
//            'defaultPageSize' => 5
//        ]);
//        $models = $query->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();
//        return $this->render('news', compact('models', 'users', 'pages'));
//    }

    public function actionMore()
    {
        if($_GET['id'] == ""){
           return $this->redirect('site/news');
        }else{
            $details = NewsForm::findOne($_GET['id']);
            $user = User::findOne($details['author_id']);
            return $this->render('more', compact('details', 'user'));
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
