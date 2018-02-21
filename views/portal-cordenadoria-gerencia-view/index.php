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
/* @var $model app\models\PortalContatoCordenadoriaGerenciaView */
/* @var $searchModel app\models\PortalContatoCordenadoriaGerenciaViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contatos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Contatos</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Contato <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/portal-cordenadoria-gerencia-view/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
            <br>
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
        'summary' => "Mostrando {begin} - {end} dos {totalCount} contatos",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=> 'id_coordenadoria',
                'value'    => 'contatoCoordenadoria.nome',
                'label'   => 'Coordenadoria',
                'filter'   => Html::activeDropDownList($searchModel, 'id_coordenadoria', ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'), array('class'=>'form-control', 'prompt' => ' '))
            ],

            [
                'attribute'=> 'ger_id',
                'value'    => 'contatoGerencia.ger_nome',
                'label'   => 'Gerência',
                'filter'   => Html::activeDropDownList($searchModel, 'ger_id', ArrayHelper::map(PortalGerencia::find()->asArray()->orderBy('ger_nome')->all(), 'ger_id', 'ger_nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],

            [
                'attribute' => 'esc_id',
                'value' => 'escritorio.esc_nome',
                'label'   => 'Escritório',
                'filter'   => Html::activeDropDownList($searchModel, 'esc_id', ArrayHelper::map(PortalEscritorio::find()->asArray()->orderBy('esc_nome')->all(), 'esc_id', 'esc_nome'), array('class'=>'form-control', 'prompt' => ' '))
            ],

            [
                'attribute' => 'cti_id',
                'value' => 'contatoTipo.cti_nome',
                'label'   => 'Tipo',
                'filter'   => Html::activeDropDownList($searchModel, 'cti_nome', ArrayHelper::map(PortalContatoTipo::find()->asArray()->orderBy('cti_nome')->all(), 'cti_nome', 'cti_nome'), array('class'=>'form-control', 'prompt' => ' '))
            ],

            [
                'attribute' => 'con_ddd',
                'value' => 'contato.con_ddd',
                'label'   => 'DDD',
                'filter'   => Html::activeDropDownList($searchModel, 'con_ddd', ArrayHelper::map(PortalContato::find()->asArray()->orderBy('con_ddd')->all(), 'con_ddd', 'con_ddd'), array('class'=>'form-control', 'prompt' => ' '))
            ],

            'con_telefone',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->cog_id ],['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->cog_id ],['title' => 'Alterar']);
                    },
                ]
            ]
        ],
    ]); ?>
</div>
