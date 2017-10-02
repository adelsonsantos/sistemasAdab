<style>
    .font-topo{
        font-size: 20px;
        font-weight: bold;
    }

    .grid{
        margin-left: 209px;
        margin-top: -26px;
    }

    #w0-filters{
        background-color: rgba(220, 222, 221, 0);
    }
    .table thead tr{
        background-color: #dcdedd;
    }
    .tambem {
        text-align: right;
    }
</style>
<?php
use app\models\DadosUnicoPessoa;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $searchModel app\models\DiariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="height: 60px">
        <h3 style="text-align: center; margin-top: 0px">Autorizar:</h3>
    </div>
</div>
<br>

<?php $perfilUser = PublicAuthItem::find()->innerJoinWith('ment')->asArray()->where(['user_id' => Yii::$app->user->getId()])->all();
$permissao = isset($perfilUser) ? $perfilUser[0]['description'] : ""; ?>
<div class="grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'Resultado não encontrado',
        'showOnEmpty' => true,
        'summary' => "<span style='white-space: nowrap'>Mostrando {begin} - {end} de {totalCount} Diárias <div style='float: right; white-space: nowrap;'>Perfil:  $permissao</div></span>",
        //'options' => ['class' => 'YourCustomTableClass'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'diaria_numero',
            [
                'attribute'=> 'diaria_beneficiario',
                'value'    => 'diariaBeneficiario.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'diaria_beneficiario', ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            'diaria_dt_saida',
            'diaria_dt_chegada',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view} {update} {autorizar_aceitar} {autorizar_devolver}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="font-size: 1.2em; margin-left: 3%"></span>', ['view', 'id' =>$key->diaria_id ],['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" style="font-size: 1.2em; margin-left: 3%"></span>', ['update', 'id' =>$key->diaria_id ],['title' => 'Alterar']);
                    },
                    'autorizar_aceitar' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-open" style="color: green; font-size: 1.2em; margin-left: 3%"></span>', ['autorizar-aceitar', 'id' =>$key->diaria_id ],['title' => 'Autorizar']);
                    },
                    'autorizar_devolver' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-save" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['autorizar-devolver', 'id' =>$key->diaria_id ],['title' => 'Devolver']);
                    },
                ]
            ]
        ],
    ]);
    ?>
</div>