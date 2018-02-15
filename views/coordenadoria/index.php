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
use app\models\DiariaCoordenadoria;
use app\models\PublicAuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariaCoordenadoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistema de Diárias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Contato das Coordenadorias e Gerências</h1>
        <p class="font-topo" style="text-align: center">
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
            ['class' => 'yii\grid\SerialColumn'],
            'id_coordenadoria',
            [
                'attribute'=> 'nome',
                'value'    => 'nome',
                'filter'   => Html::activeDropDownList($searchModel, 'nome', ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'nome', 'nome'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
