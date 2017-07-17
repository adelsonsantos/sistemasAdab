<?php

namespace app\controllers;

use app\models\PortalContato;
use app\models\PortalGerencia;
use Yii;
use app\models\PortalContatoGerencia;
use app\models\PortalContatoGerenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortalContatoGerenciaController implements the CRUD actions for PortalContatoGerencia model.
 */
class PortalContatoGerenciaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PortalContatoGerencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortalContatoGerenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortalContatoGerencia model.
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
     * Creates a new PortalContatoGerencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PortalContatoGerencia();
        $modelContato = new PortalContato();
        $modelGerencia = new PortalGerencia();

        if ($modelContato->load(Yii::$app->request->post()) && $modelContato->save()) {
            $model->con_id = $modelContato->con_id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->cge_id]);
            }
        }else {
            return $this->render('create', [
                'modelGerencia' => $modelGerencia,
                'modelContato' => $modelContato,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PortalContatoGerencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cge_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/

        $model = PortalContatoGerencia::findOne($id);
        $this->validaModel($model);

        $modelContato = PortalContato::findOne($model->con_id);
        $this->validaModel($modelContato);

        $modelGerencia = PortalGerencia::findOne($model->ger_id);
        $this->validaModel($modelGerencia);

        if ($modelContato->load(Yii::$app->request->post()) && $modelContato->save()) {
            $model->con_id = $modelContato->con_id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->cge_id]);
            }
        }else {
            return $this->render('update', [
                'modelGerencia' => $modelGerencia,
                'modelContato' => $modelContato,
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PortalContatoGerencia model.
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
     * Finds the PortalContatoGerencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortalContatoGerencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortalContatoGerencia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function validaModel($model)
    {
        if (!$model) {
            throw new NotFoundHttpException("The user was not found.");
        }
    }
}
