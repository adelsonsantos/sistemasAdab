<?php

namespace app\controllers;

use app\models\PortalContato;
use app\models\PortalContatoCordenadoriaGerenciaViewSearch;
use app\models\PortalEscritorio;
use app\models\PortalGerencia;
use Yii;
use app\models\PortalCoordenadoriaGerencia;
use app\models\PortalCoordenadoriaGerenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortalCordenadoriaGerenciaViewController implements the CRUD actions for PortalCoordenadoriaGerenciaView model.
 */
class PortalCordenadoriaGerenciaViewController extends Controller
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

    public function actionGerencia($id){
        $rows = PortalGerencia::find()->where(['id_coordenadoria' => $id])->all();

        echo "<option>Selecione a Gerência</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->ger_id'>$row->ger_nome</option>";
            }
        }
        else{
            echo "<option>Nenhuma Gerência cadastrada</option>";
        }

    }

    public function actionEscritorio($id){
        $rows = PortalEscritorio::find()->where(['ger_id' => $id])->all();

        echo "<option>Selecione o Escritório</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->esc_id'>$row->esc_nome</option>";
            }
        }
        else{
            echo "<option>Nenhum Escritório cadastrado</option>";
        }

    }


    /**
     * Lists all PortalContatoCordenadoriaGerenciaView models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortalContatoCordenadoriaGerenciaViewSearch();
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
     * @throws NotFoundHttpException if the model cannot be found
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
        $contato = new PortalContato();

        if($contato->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post())){
            $contato->con_id = $contato::find()->orderBy(['con_id' => SORT_DESC])->one()->con_id +1;
            $contato->save();
            $model->con_id = isset($contato->con_id) ? $contato->con_id : null;
            $model->cog_id = $model::find()->orderBy(['cog_id' => SORT_DESC])->one()->cog_id +1;
            $model->save();
            return $this->redirect(['view', 'id' => $model->cog_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'contato' => $contato
        ]);
    }

    /**
     * Updates an existing PortalCoordenadoriaGerencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $contato = PortalContato::findOne($model->con_id);
        $this->validaModel($contato);

        if ($contato->load(Yii::$app->request->post()) && $contato->save()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->cog_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'contato' => $contato
        ]);
    }

    /**
     * Deletes an existing PortalCoordenadoriaGerencia model.
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
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function validaModel($model)
    {
        if (!$model) {
            throw new NotFoundHttpException("The user was not found.");
        }
    }
}
