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
        <h1 class="font-topo" style="text-align: center">Coordenadorias</h1>
        <p class="font-topo" style="text-align: center">
            <?=Html::a('Cadastrar Coordenadoria <span class="glyphicon glyphicon-plus" style="color: white; font-size: 1.2em; margin-left: 3%"></span>', ['/coordenadoria/create'], ['class'=>'btn btn-success', 'title' => 'Cadastrar Contato']); ?>
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
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=> 'nome',
                'value'    => 'nome',
                'filter'   => Html::activeDropDownList($searchModel, 'nome', ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'nome', 'nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->id_coordenadoria ],['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->id_coordenadoria ],['title' => 'Alterar']);
                    },
                ]
            ]
        ],
    ]);
    ?>
</div>
