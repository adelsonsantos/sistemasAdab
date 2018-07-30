<?php

namespace app\controllers;

use app\models\Model;
use app\models\PortalEntrada;
use app\models\PortalEntrada2;
use http\Exception;
use Yii;
use app\models\PortalEquipamento;
use app\models\PortalEquipamentoSearch;
use yii\db\StaleObjectException;
use yii\helpers\ArrayHelper;
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
        $model = new PortalEquipamento;
        $modelEntrada = [new PortalEntrada];
        //$model = new Customer;
        //$modelEntrada = [new Address];

        if ($model->load(Yii::$app->request->post())) {
            $model->equipamento_id = 28;
            $modelEntrada = Model::createMultiple(PortalEntrada::classname());
            Model::loadMultiple($modelEntrada, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelEntrada) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelEntrada as $entrada) {
                            $entrada->equipamento_id = $model->equipamento_id;
                            if (!($flag = $entrada->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->equipamento_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                } catch (\yii\db\Exception $e) {
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelEntrada' => (empty($modelEntrada)) ? [new PortalEntrada] : $modelEntrada
        ]);
    }

    public function nextIdEquipamento()
    {
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
        //  $modelsEntrada = $model->equipamento_id;
        $oldEntradaIds = PortalEntrada::find()->where(['equipamento_id' => $id])->asArray()->all();
        $oldmultiploEntradaIds = ArrayHelper::getColumn($oldEntradaIds, 'equipamento_id');
        $modelsEntrada = PortalEntrada::findAll(['equipamento_id' => $oldmultiploEntradaIds]);

        if ($model->load(Yii::$app->request->post())) {

            /** @var PortalEntrada $modelsEntrada */
            //$oldIDs = ArrayHelper::map($modelsEntrada, 'equipamento_id', 'equipamento_id');
            $modelsEntrada = Model::createMultiple(PortalEntrada::classname(), $modelsEntrada);
            if (!empty($modelsEntrada)) {
                Model::loadMultiple($modelsEntrada, Yii::$app->request->post());
            }
            $modelsOlds = PortalEntrada::find()->where(['equipamento_id' => $id])->all();

            //  $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsEntrada, 'equipamento_id', 'equipamento_id')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsEntrada) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if (!empty($modelsOlds)) {
                        foreach ($modelsOlds as $value) {
                            try {
                                $this->findModelFenceCoordenada($value->entrada_id)->delete();
                            } catch (StaleObjectException $e) {
                            } catch (NotFoundHttpException $e) {
                            } catch (\Throwable $e) {
                            }
                        }
                    }

                    if ($flag = $model->save(false)) {
                        foreach ($modelsEntrada as $entrada) {
                            $entrada->equipamento_id = $model->equipamento_id;
                            if (!($flag = $entrada->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->equipamento_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelEntrada' => (empty($modelEntrada)) ? [new PortalEntrada] : $modelEntrada
        ]);


        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->equipamento_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);*/
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

    private function findModelFenceCoordenada($entrada_id)
    {
        if (($model = PortalEntrada::findOne($entrada_id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
