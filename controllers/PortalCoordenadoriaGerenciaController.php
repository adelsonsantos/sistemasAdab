<?php

namespace app\controllers;

use app\models\DiariaCoordenadoria;
use app\models\PortalGerencia;
use Yii;
use app\models\PortalCoordenadoriaGerencia;
use app\models\PortalCoordenadoriaGerenciaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortalCoordenadoriaGerenciaController implements the CRUD actions for PortalCoordenadoriaGerencia model.
 */
class PortalCoordenadoriaGerenciaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PortalCoordenadoriaGerencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortalCoordenadoriaGerenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortalCoordenadoriaGerencia model.
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
     * Creates a new PortalCoordenadoriaGerencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PortalCoordenadoriaGerencia();
        $modelCoordenadoria = new DiariaCoordenadoria();
        $modelGerencia = new PortalGerencia();

        if ($modelGerencia->load(Yii::$app->request->post()) && $modelGerencia->save()) {
            $model->ger_id = $modelGerencia->ger_id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ger_id]);
            }
        } else {
            return $this->render('create', [
                'modelCoordenadoria' => $modelCoordenadoria,
                'modelGerencia' => $modelGerencia,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PortalCoordenadoriaGerencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = PortalCoordenadoriaGerencia::findOne($id);
        $this->validaModel($model);

        $modelGerencia = PortalGerencia::findOne($model->ger_id);
        $this->validaModel($modelGerencia);

        $modelCoordenadoria = DiariaCoordenadoria::findOne($model->id_coordenadoria);
        $this->validaModel($modelCoordenadoria);

        if ($modelGerencia->load(Yii::$app->request->post()) && $modelGerencia->save()) {
            $model->ger_id = $modelGerencia->ger_id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ger_id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelGerencia' => $modelGerencia,
                'modelCoordenadoria' => $modelCoordenadoria,
            ]);
        }
    }

    /**
     * Deletes an existing PortalCoordenadoriaGerencia model.
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
     * Finds the PortalCoordenadoriaGerencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortalCoordenadoriaGerencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortalCoordenadoriaGerencia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function validaModel($model)
    {
        if (!$model) {
            throw new NotFoundHttpException("The model was not found.");
        }
    }
}
