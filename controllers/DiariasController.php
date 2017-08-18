<?php

namespace app\controllers;

use Yii;
use app\models\Diarias;
use app\models\DiariasSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiariasController implements the CRUD actions for Diarias model.
 */
class DiariasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [/*
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    /*[
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['adelson.santos'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],*/
        ];
    }

    public function verificaPerfil($id)
    {
        switch ($id) {
            case 11:
                return 'administrador';
                break;
            case 6:
                return 'aprovador';
                break;
            case 5:
                return 'autorizador';
                break;
            case 4:
                return 'comprovador';
                break;
            case 34:
                return 'consulta-diarias';
                break;
            case 9:
                return 'empenha-executa';
                break;
            case 35:
                return 'gestor-orcamento';
                break;
            case 33:
                return 'gestor-despesas';
                break;
            case 7:
                return 'gestor-diarias';
                break;
            case 18:
                return 'gestor-financeiro';
                break;
            case 31:
                return 'pre-autorizador';
                break;
            case 8:
                return 'pre-liquidante';
                break;
            case 36:
                return 'recursos-humanos';
                break;
            case 30:
                return 'solicitante';
                break;
            default:
                return 11;
                break;

        }
    }

    /**
     * Lists all Diarias models.
     * @return mixed
     */
    public function actionIndex()
    {
            $searchModel = new DiariasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionRelatorioDiariasPorServidor()
    {
       // if(Yii::$app->user->can('diaria-index')) {
            $searchModel = new DiariasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('relatorio-diarias-por-servidor', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
     /*   }else{
            echo "Sem permissão";
        }*/
    }

    /**
     * Displays a single Diarias model.
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
     * Creates a new Diarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diarias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->diaria_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Diarias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->diaria_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Diarias model.
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
     * Finds the Diarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diarias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
