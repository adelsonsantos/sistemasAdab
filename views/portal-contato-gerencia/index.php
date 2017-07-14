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

use app\models\PortalContato;
use app\models\PortalGerencia;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalContatoGerenciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contato das Gerências';
?>
<div class="diarias-index" id="diarias">

    <div class="jumbotron">
        <div class="col-md-3 column" id="menu_vertical">
            <ul  class="nav nav-pills nav-stacked">
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Coordenadorias', ['/diaria-coordenadoria/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contatos Coordenadorias', ['/portal-contato-coordenadoria/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Gerências', ['/portal-coordenadoria-gerencia/index'])?></li>
                <li class="active"><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contatos Gerências', ['/portal-contato-gerencia/index'])?></li>
            </ul>
        </div>
<div class="portal-contato-gerencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Portal Contato Gerencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'ger_id',
                'value' => 'ger.ger_nome',
                'filter'   => Html::activeDropDownList($searchModel, 'ger_id', ArrayHelper::map(PortalGerencia::find()->asArray()->orderBy('ger_nome')->all(), 'ger_nome', 'ger_nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            [
                'attribute' => 'cge_id',
                'value' => 'con.con_ddd',
                'filter'   => Html::activeDropDownList($searchModel, 'cge_id', ArrayHelper::map(PortalContato::find()->asArray()->orderBy('con_ddd')->all(), 'con_ddd', 'con_ddd'), array('class'=>'form-control', 'prompt' => ' '))
            ],
            [
                'attribute' => 'con_id',
                'value' => 'con.con_telefone',
                'filter'   => Html::activeDropDownList($searchModel, 'con_id', ArrayHelper::map(PortalContato::find()->asArray()->orderBy('con_telefone')->all(), 'con_telefone', 'con_telefone'), array('class'=>'form-control', 'prompt' => ' '))
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
