<style>
    .font-topo{
        font-size: 20px;
        font-weight: bold;
    }

    .grid{
        margin-left: 209px;
    }

    #w0-filters{
        background-color: rgba(220, 222, 221, 0);
    }
    .table thead tr{
        background-color: #82a3bd;
    }
    .tambem {
        text-align: right;
    }
</style>
<?php
use app\models\DadosUnicoPessoa;
use app\models\DiariaCoordenadoria;
use app\models\PortalContato;
use app\models\PortalContatoTipo;
use app\models\PortalEscritorio;
use app\models\PortalGerencia;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TermoVigilanciaFiscalizacaoAcoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionário';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Funcionário</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Funcionário <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/dados-unico-funcionario/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Funcionário']); ?>
            <br>

        </p>
    </div>
</div>
<div class="grid">

    <?php try {
       echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [


                'funcionario_matricula',
                'pessoa_id',
                //'funcionario_ramal',
                //'funcionario_email:email',
                //'funcionario_dt_admissao',
                //'funcionario_dt_demissao',
                //'funcionario_orgao_origem',
                //'funcionario_conta_fgts',
                //'contrato_id',
                //'funcionario_salario',
                //'cargo_temporario',
                //'funcionario_orgao_destino',
                //'est_organizacional_lotacao_id',
                //'funcionario_validacao_propria',
                //'funcionario_validacao_rh',
                //'funcionario_envio_email:email',
                //'funcionario_tipo_id_old',
                //'motorista',
                //'funcionario_onus',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    } catch (Exception $e) {
    } ?>
</div>




