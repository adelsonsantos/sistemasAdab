<?php

namespace app\controllers;

use app\models\PortalEntrada2;
use Yii;
use app\models\PortalEquipamento;
use app\models\PortalEquipamentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;

/**
 * PortalEquipamentoController implements the CRUD actions for PortalEquipamento model.
 */
class PortalEquipamentoController extends Controller
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
     * Lists all PortalEquipamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortalEquipamentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortalEquipamento model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PortalEquipamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PortalEquipamento();
        $modelEntrada = new PortalEntrada2();

        $model->equipamento_id = $this->nextIdEquipamento();
        $model->equipamento_pessoa = 5559;
        $DateTime =   new DateTime();
        $model->equipamento_data = $DateTime->format( "Y-m-d H:i:s" );
        $modelEntrada->entrada_data = $DateTime->format( "Y-m-d H:i:s" );
        $modelEntrada->entrada_pessoa = 5559;
        $modelEntrada->entrada_status = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($modelEntrada->load(Yii::$app->request->post())) {
                $modelEntrada->equipamento_id = $model->equipamento_id;
                $modelEntrada->entrada_id = 1;
                $modelEntrada->entrada_quantidade = 1;
                $modelEntrada->setor_id = 16;
                $modelEntrada->entrada_pessoa = 5559;
                d($modelEntrada->save());
                return $this->redirect(['view', 'id' => $model->equipamento_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelEntrada' => $modelEntrada
        ]);
    }

    public function nextIdEquipamento(){
        $model = new PortalEquipamento();
        return PortalEquipamento::find()->orderBy(['equipamento_id' => SORT_DESC])->one()->attributes['equipamento_id'] + 1;
    }

    /**
     * Updates an existing PortalEquipamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->equipamento_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PortalEquipamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PortalEquipamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortalEquipamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortalEquipamento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
