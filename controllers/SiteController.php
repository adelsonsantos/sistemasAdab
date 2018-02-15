<?php

namespace app\controllers;

use app\models\DadosUnicoPessoa;
use app\models\User;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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

    public function actionGetReport(){
        return $this->redirect(['diarias/index']);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->actionLogin();
        }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        /* @var $thisWeb \yii\web\View */
        $model = new LoginForm();
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionUpdatepassword()
    {
        if(isset($_POST['User']['usuario_login'])) {
            d($_POST['User']['usuario_login']);
            $login = trim($_POST['User']['usuario_login']);

            $userLogin = User::findAll([
                'usuario_login' => $login,
            ]);
            d($userLogin[0]->pessoa_id);
            $getEmail = DadosUnicoPessoa::findAll([
                'pessoa_id' => $userLogin[0]->pessoa_id
            ]);
            d($getEmail[0]->pessoa_email);

        }
        $model = new User();
        return $this->render('updatepassword', [
            'model' => $model,
        ]);
    }


    public function actionEmail()
    {
        return $this->render('email');
    }
    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) )
        {
            Yii::$app->mailer->compose()
                ->setFrom('adelson.santos@adab.ba.gov.br')
                ->setTo('adelson.santos@adab.ba.gov.br')
                ->setSubject('Email sent from Yii2-Swiftmailer')
                ->send();
            d(Yii::$app->mailer->compose()
                ->setFrom('adelson.art@hotmail.com')
                ->setTo('adelson.santos@adab.ba.gov.br')
                ->setSubject('subject')
                ->setTextBody('text')
                ->send());
            echo 'enviou com sucesso';
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFeed()
    {
        return $this->render('feed');
    }
}
