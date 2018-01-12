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

use app\models\DadosUnicoEstOrganizacional;
use app\models\DadosUnicoPessoa;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

/* @var $model app\models\Diarias */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Arquivar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>

<div style="height:75px;">
    <div>
        <?=Html::beginForm(['empenho-liberar-multiplo'],'post');?>
        <h1 class="font-topo" style="text-align: center">Diárias Empenho <?=Html::submitButton('<span class="glyphicon glyphicon-open" style="color: green; font-size: 1.2em; margin-left: 3%"></span>', ['class' => 'btn btn-default',
                'title' => 'Liberar Multiplos Empenhos',
                'data' => [
                    'confirm' => 'Tem certeza que deseja LIBERAR o EMPENHO?',
                    'method'  => 'post',
                ]]);?>
        </h1>
        <p class="font-topo" style="text-align: center">
            <br>
            <?php $perfilUser = PublicAuthItem::find()->innerJoinWith('ment')->asArray()->where(['user_id' => Yii::$app->user->getId()])->all();
            $permissao = isset($perfilUser) ? $perfilUser[0]['description'] : ""; ?>
        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap; margin-top: -10px"><strong><?= "Perfil: " . $permissao; ?></strong></p>
    </div>
</div>
<div class="grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "Mostrando {begin} - {end} de {totalCount} Diárias",
        //'options' => ['class' => 'YourCustomTableClass'],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn',  'checkboxOptions' => function($model) {
                return ['value' => $model->diaria_id];
            }],

            'diaria_numero',
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],

            [
                'label' => 'Partida Prevista',
                'attribute' => 'diaria_dt_saida'
            ],
            [
                'label'     => 'Fonte',
                'attribute' => 'fonte_cd'
            ],
            [
                'label'     => 'Diretoria',
                'attribute' => 'diariaUnidadeCusto.est_organizacional_sigla',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_unidade_custo', ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_centro_custo' => 1])->andWhere(['est_organizacional_st' => 0])->orderBy('est_organizacional_sigla')->all(), 'est_organizacional_id', 'est_organizacional_sigla'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute'=> 'diaria_empenho',
                'value' => function($key){ return '';},
                'contentOptions' => function($key){
                    return !is_null($key->diaria_empenho) ? ['class' => 'glyphicon glyphicon-stop', 'style' => 'color: green; width: 100%; font-size: 30px; text-align: center'] : ['class' => 'glyphicon glyphicon-stop', 'style' => 'color: red; width: 100%; font-size: 30px; text-align: center'];
                },
                'filter'   => ''
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view} {empenho_empenhar} {empenho_devolver} {empenho_liberar}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="font-size: 1.2em; margin-left: 3%"></span>', ['view', 'id' =>$key->diaria_id ],['title' => 'Ver']);
                    },
                    'empenho_empenhar' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-ok-sign" style="color: #1B5E20; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-empenhar', 'id' =>$key->diaria_id ],['title' => 'Empenhar']);
                    },
                    'empenho_devolver' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-save" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-devolver', 'id' =>$key->diaria_id ],['title' => 'Devolver']);
                    },
                    'empenho_liberar' => function ($model, $key) {
                        if(!is_null($key->diaria_empenho)){
                            return Html::a('<span class="glyphicon glyphicon-open" style="color: green; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-liberar', 'id' =>$key->diaria_id],[
                                'title' => 'Liberar Empenho',
                                'data' => [
                                    'confirm' => 'Tem certeza que deseja LIBERAR o EMPENHO?',
                                    'method'  => 'post',
                                ]
                            ]);
                        }
                    },
                ]
            ]
        ],
    ]); ?>
    <?= Html::endForm();?>
</div>