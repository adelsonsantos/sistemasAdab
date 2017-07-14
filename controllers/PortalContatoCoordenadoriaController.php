<?php

namespace app\controllers;

use app\models\DiariaCoordenadoria;
use Yii;
use app\models\PortalContato;
use app\models\PortalContatoCoordenadoria;
use app\models\PortalContatoCoordenadoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortalContatoCoordenadoriaController implements the CRUD actions for PortalContatoCoordenadoria model.
 */
class PortalContatoCoordenadoriaController extends Controller
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
     * Lists all PortalContatoCoordenadoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortalContatoCoordenadoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortalContatoCoordenadoria model.
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
     * Creates a new PortalContatoCoordenadoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelContato = new PortalContato();
        $modelCoordenadoria = new DiariaCoordenadoria();
        $model = new PortalContatoCoordenadoria();

        if ($modelContato->load(Yii::$app->request->post()) && $modelContato->save()) {
            $model->con_id = $modelContato->con_id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->coc_id]);
            }
        }
         else {
            return $this->render('create', [
                'modelCoordenadoria' => $modelCoordenadoria,
                'modelContato' => $modelContato,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PortalContatoCoordenadoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->coc_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PortalContatoCoordenadoria model.
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
     * Finds the PortalContatoCoordenadoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortalContatoCoordenadoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortalContatoCoordenadoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
