<?php

namespace app\controllers;

use app\models\DadosUnicoDadosBancarios;
use app\models\DadosUnicoEndereco;
use app\models\DadosUnicoEstOrganizacionalFuncionario;
use app\models\DadosUnicoEstOrganizacionalLotacao;
use app\models\DadosUnicoFuncionarioArquivo;
use app\models\DadosUnicoFuncionarioSearch;
use app\models\DadosUnicoMunicipio;
use app\models\DadosUnicoNivelTecnico;
use app\models\DadosUnicoPessoa;
use app\models\DadosUnicoPessoaFisica;
use app\models\DadosUnicoPessoaStatus;
use app\models\DadosUnicoTelefone;
use app\models\Model;
use Yii;
use app\models\DadosUnicoFuncionario;
use app\models\TermoVigilanciaFiscalizacaoAcoesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DadosUnicoFuncionarioController implements the CRUD actions for DadosUnicoFuncionario model.
 */
class DadosUnicoFuncionarioController extends Controller
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

    public function actionGetMunicipio($id){
        $rows = DadosUnicoMunicipio::find()->where(['estado_uf' => $id])->orderBy('municipio_ds')->all();
        echo "<option>Selecione o Municipio</option>";
        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->municipio_cd'>$row->municipio_ds</option>";
            }
        }
        else{
            echo "<option>Nenhuma Municipio cadastrada</option>";
        }
    }

public function actionAtivarInativar($pessoa_id){
       $model= DadosUnicoPessoa::findOne($pessoa_id);
       if($model->pessoa_st==0){

           $model->pessoa_st=1;

       }else{
           $model->pessoa_st=0;
       }
       $model->save();
       $this->redirect('index');

}



    /**
     * Lists all DadosUnicoFuncionario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DadosUnicoFuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DadosUnicoFuncionario model.
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
     * Creates a new DadosUnicoFuncionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DadosUnicoFuncionario();
        $modelPessoaFisica = new DadosUnicoPessoaFisica();
        $modelPessoa = new DadosUnicoPessoa();
        $modelNivelTecnico=new DadosUnicoNivelTecnico();
        $modelEndereco = new DadosUnicoEndereco();
        $modelsTelefone = [new DadosUnicoTelefone];
        $modelFuncionario = new DadosUnicoFuncionario();
        $modelUnidadeLotacao = new DadosUnicoEstOrganizacionalFuncionario();
        $modelDadosBancarios = new DadosUnicoDadosBancarios();
        $modelFuncionarioArquivo = new DadosUnicoFuncionarioArquivo();


        if ($model->load(Yii::$app->request->post())/* && $model->save()*/) {
            $modelPessoaFisica->load(Yii::$app->request->post());
            $modelPessoa->load(Yii::$app->request->post());
            $modelNivelTecnico->load(Yii::$app->request->post());
            $modelEndereco->load(Yii::$app->request->post());
            $modelFuncionario->load(Yii::$app->request->post());
            $modelUnidadeLotacao->load(Yii::$app->request->post());
            $modelDadosBancarios->load(Yii::$app->request->post());
            $modelFuncionarioArquivo->load(Yii::$app->request->post());




            d($modelFuncionarioArquivo);

            $modelsTelefone = Model::createMultiple(DadosUnicoTelefone::classname());
            Model::loadMultiple($modelsTelefone, Yii::$app->request->post());

            return $this->redirect(['view', 'id' => $model->funcionario_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelPessoaFisica'=> $modelPessoaFisica,
            'modelPessoa'=>$modelPessoa,
            'modelNivelTecnico'=>$modelNivelTecnico,
            'modelEndereco'=>$modelEndereco,
            'modelsTelefone' => (empty($modelsTelefone)) ? [new DadosUnicoTelefone] : $modelsTelefone,
            'modelFuncionario'=>$modelFuncionario,
            'modelUnidadeLotacao'=> $modelUnidadeLotacao,
            'modelDadosBancarios'=>$modelDadosBancarios,
            'modelFuncionarioArquivo'=>$modelFuncionarioArquivo
        ]);
    }

    /**
     * Updates an existing DadosUnicoFuncionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->funcionario_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DadosUnicoFuncionario model.
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
     * Finds the DadosUnicoFuncionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DadosUnicoFuncionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DadosUnicoFuncionario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
