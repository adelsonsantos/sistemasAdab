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
<div style="height:40px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Funcionário</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Funcionário <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/dados-unico-funcionario/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Funcionário']); ?>
            <br>

        </p>
    </div>
</div>
<div class="grid">

    <?php
    use kartik\export\ExportMenu;


    try {

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'funcionario_matricula',

        [
            'attribute'=> 'pessoa_id',
            'value'    => 'pessoaNome.pessoa_nm',
            'label'   => 'Nome',
            'filter'   => Html::activeDropDownList($searchModel, 'pessoa_id', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), array('class'=>'form-control', 'prompt' => ' '))
        ],
        [
            'attribute'=> 'est_organizacional_lotacao_id',
            'value'    =>function($model){
                $estrutura = \app\models\DadosUnicoEstOrganizacionalFuncionario::find()->where(['funcionario_id'=>$model->funcionario_id])->with('estOrganizacional')->all();
                $sigla = !empty($estrutura[0]->estOrganizacional->est_organizacional_sigla) ? $estrutura[0]->estOrganizacional->est_organizacional_sigla : 'Não informado ';
                return $sigla;
            },
            'label'   => 'Estrutura/Atuação',
            'filter'   => false
        ],
        [ 'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width: 8.7%'],
            'template' => '{view} {update} {delete} ',
            'buttons' => [
                'view' => function ($model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->funcionario_id ],['title' => 'Ver']);
                },
                'update' => function ($model, $key) {

                    return Html::a('<span  class="glyphicon glyphicon-pencil" style="color: darkblue; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->funcionario_id ],['title' => 'Editar']);

                },
                'delete' => function ($model, $key) {

                    return Html::a('<span class="glyphicon glyphicon-remove" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-liberar', 'id' =>$key->funcionario_id],[
                        'title' => 'Deletar'
                    ]);

                },
            ]
        ],
    ];

    // Renders a export dropdown menu

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
    ]);

    // You can choose to render your own GridView separately
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);

    } catch (Exception $e) {
    }?>


</div>




