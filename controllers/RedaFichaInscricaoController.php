<?php

namespace app\controllers;

use app\models\RedaProcessoSeletivo;
use Yii;
use app\models\RedaFichaInscricao;
use app\models\RedaFichaInscricaoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RedaFichaInscricaoController implements the CRUD actions for RedaFichaInscricao model.
 */
class RedaFichaInscricaoController extends Controller
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
     * Lists all RedaFichaInscricao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RedaFichaInscricaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionProcessoSeletivo()
    {
        $searchModel = new RedaFichaInscricaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new RedaProcessoSeletivo();

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['ficha-inscricao']);
        }
        return $this->render('processo-seletivo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model
        ]);
    }




    /**
     * Displays a single RedaFichaInscricao model.
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
     * Creates a new RedaFichaInscricao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionFichaInscricao()
    {
        $model = new RedaFichaInscricao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDE_FICHA_INSCRICAO]);
        }

        return $this->render('ficha-inscricao', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RedaFichaInscricao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->IDE_FICHA_INSCRICAO]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RedaFichaInscricao model.
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
     * Finds the RedaFichaInscricao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RedaFichaInscricao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RedaFichaInscricao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
