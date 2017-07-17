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
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariaCoordenadoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coordenadorias';
?>

<div class="diarias-index" id="diarias">

    <div class="jumbotron">
        <div class="col-md-3 column" id="menu_vertical">
            <ul  class="nav nav-pills nav-stacked">
                <li class="active"><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Coordenadorias', ['/diaria-coordenadoria/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contato das Coordenadorias', ['/portal-contato-coordenadoria/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Gerências', ['/portal-coordenadoria-gerencia/index'])?></li>
                <li><?= Html::a('<span class="glyphicon glyphicon-chevron-right"></span> Contato das Gerências', ['/portal-contato-gerencia/index'])?></li>
            </ul>
        </div>

<div class="diaria-coordenadoria-index">
        <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Criar nova Coordenadoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=> 'nome',
                'value'    => 'nome',
                'filter'   => Html::activeDropDownList($searchModel, 'nome', ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'nome', 'nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
