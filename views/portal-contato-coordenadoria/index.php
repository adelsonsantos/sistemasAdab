<style>
    .table.table-striped tbody tr:hover
    {
        background: #acc7b8;
    }

    #diarias {
        margin-top: -80px;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #fff;
        background-color: #072b17;
    }

    .nav-pills>li>a {
        border-radius: 0px;
    }

    a {
        color: #000;
        text-decoration: none;
    }

    a:hover {
        color: #000;
        text-decoration: none;
    }

    .nav-stacked>li+li {
        margin-top: 0px;
        margin-left: 0;
        border-bottom:1px solid #dadada;
        border-left:1px solid #dadada;
        border-right:1px solid #dadada;
    }
    #menu_vertical {
        margin-bottom: 10px;
        margin-left: -14px;
        text-align: left;

    }
</style>
<?php
use app\models\DiariaCoordenadoria;
use app\models\PortalContato;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalContatoCoordenadoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contato das Coordenadorias';
$model = new PortalContato();
$coordenadoria = new DiariaCoordenadoria();
?>

<div class="diarias-index" id="diarias">

    <div class="jumbotron">
        <div class="col-md-3 column" id="menu_vertical">
            <ul  class="nav nav-pills nav-stacked">
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Coordenadorias', ['/coordenadoria/index'])?></li>
                <li class="active"><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contato das Coordenadorias', ['/portal-contato-coordenadoria/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Gerências', ['/portal-cordenadoria-gerencia-view/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contato das Gerências', ['/portal-contato-gerencia/index'])?></li>
            </ul>
        </div>

        <div class="portal-contato-coordenadoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Contato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_coordenadoria',
                'value' => 'idCoordenadoria.nome',
                'filter'   => Html::activeDropDownList($searchModel, 'id_coordenadoria', ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'nome', 'nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute' => 'coc_id',
                'value' => 'con.con_ddd',
                'filter'   => Html::activeDropDownList($searchModel, 'coc_id', ArrayHelper::map(PortalContato::find()->asArray()->orderBy('con_ddd')->all(), 'con_ddd', 'con_ddd'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute' => 'con_id',
                'value' => 'con.con_telefone',
                'filter'   => Html::activeDropDownList($searchModel, 'con_id', ArrayHelper::map(PortalContato::find()->asArray()->orderBy('con_telefone')->all(), 'con_telefone', 'con_telefone'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
