<style>
    .table.table-striped tbody tr:hover
    {
        background: #c4e5ff;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #000000;
        background-color: #82a3bd;
        font-weight: bold;
    }
    /*  .nav-pills>li>a {
          border-radius: 0px;
      }*/
    a {
        color: #000;
        text-decoration: none;
    }
    a:hover {
        color: #000;
        text-decoration: none;
    }
    .nav-stacked>li+li {
        margin-left: 0;
        font-family: Arial, "Helvetica Neue", Helvetica, Arial, sans-serif;
        border-bottom:1px solid #dadada;
        border-left:1px solid #dadada;
        border-right:1px solid #dadada;
    }
    #itens:hover {
        background-color: #d4d4d4;
    }
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
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .tambem {
        text-align: right;
    }
</style>


<?php
use aki\vue\Vue;
?>
<?php Vue::begin([
    'id' => "vue-app",
    'data' => [
        'message' => "hello",
        'seen' => false,
        'todos' => [
            ['text' => "text"],
            ['text' => "akbar joudi"]
        ]
    ],
    'methods' => [
        'reverseMessage' => new yii\web\JsExpression("function(){"
            . "this.message ='Adelson'; "
            . "}"),
    ]
]); ?>

<p>{{ message }}</p>

<button v-on:click="reverseMessage">Reverse Message</button>

<p v-if="seen">Now you see me</p>

<ol>
    <li v-for="todo in todos">
        {{ todo.text }}
    </li>
</ol>

<input v-model="message">

<?php Vue::end(); ?>







<?php
use app\models\DadosUnicoPessoa;
use app\models\Diarias;
use app\models\DiariaStatus;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $thiiis app\controllers\DiariasController */
/* @var $model app\models\Diarias */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistema de Diárias';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div style="position: absolute">
        <?= Yii::$app->controller->renderPartial('menu');?>
    </div>
    <div style="height:75px;">
        <div>
            <h1 class="font-topo" style="text-align: center">Diárias</h1>
            <?=Html::beginForm(['empenho-liberar-multiplo'],'post');?>

            <p class="font-topo" style="text-align: center">
                <?= Yii::$app->user->can('diaria-index')
                    ? Html::a('Solicitar Diária <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/diarias/create'], ['class'=>'btn btn-success', 'title' => 'Solicitar Diária'])
                    : ''; ?>

                <?php $perfilUser = PublicAuthItem::find()->innerJoinWith('ment')->asArray()->where(['user_id' => Yii::$app->user->getId()])->all();
                $permissao = isset($perfilUser) ? $perfilUser[0]['description'] : "";
                ?>
            </p>
        </div>
        <div>
            <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong><?= "Perfil: " . $permissao; ?></strong></p>
        </div>
    </div>
<div class="grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "Mostrando {begin} - {end} de {totalCount} Diárias",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'diaria_numero',
            [
                'attribute'=> 'diaria_solicitante',
                'value'    => 'diariaSolicitante.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_solicitante', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            'diaria_dt_saida',
            'diaria_dt_chegada',
            'qtde_roteiros',
            [
                'attribute'=> 'diaria_st',
                'value'    => 'diariaStatus.status_ds',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_st', ArrayHelper::map(DiariaStatus::find()->asArray()->orderBy('status_ds')->all(), 'status_id', 'status_ds'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view} {update} {delete} {comprovacao}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->diaria_id ],['title' => 'Ver']);
                    },
                    /*'update' => function ($model, $key) {
                        return Html::a('<span  class="glyphicon glyphicon-pencil" style="width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->diaria_id ],['title' => 'Alterar']);
                    },*/
                    'update' => function ($model, $key) {
                        if($key->diaria_st === Diarias::AUTORIZACAO || $key->diaria_st === Diarias::PRE_AUTORIZAR){
                            return Html::a('<span  class="glyphicon glyphicon-pencil" style="color: darkblue; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->diaria_id ],['title' => 'Alterar']);
                        }
                    },
                    'delete' => function ($model, $key) {
                        if($key->diaria_st === Diarias::AUTORIZACAO || $key->diaria_st === Diarias::PRE_AUTORIZAR){
                            return Html::a('<span class="glyphicon glyphicon-trash" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-liberar', 'id' =>$key->diaria_id],[
                                'title' => 'Deletar'
                            ]);
                        }
                    },
                    'comprovacao' => function ($model, $key) {
                        if($key->diaria_st === Diarias::COMPROVACAO){
                            return Html::a('<span class="glyphicon glyphicon-edit" style="color: green; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-liberar', 'id' =>$key->diaria_id],[
                                'title' => 'Comprovar'
                            ]);
                        }
                    },
                ]
            ]
        ],
    ]);
    ?>
</div>