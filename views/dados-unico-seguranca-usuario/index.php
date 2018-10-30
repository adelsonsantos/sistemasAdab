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
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DadosUnicoSegurancaUsuarioSearch */
/* @var $model app\models\DadosUnicoSegurancaUsuario */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuário';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu');?>
</div>
<div style="height:75px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Usuário</h1>
    </div>
</div>
<div class="grid">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=> 'pessoa_id',
                'value'    => 'pessoa.pessoa_nm',
                'filter'   => Html::activeDropDownList($searchModel, 'pessoa_id', ArrayHelper::map(app\models\DadosUnicoPessoa::find()->asArray()->orderBy('pessoa_nm')->all(), 'pessoa_id', 'pessoa_nm'), ['class'=>'form-control', 'prompt' => ' '])
            ],
            'usuario_login',
            //'usuario_senha',
            //'usuario_st',
           // 'usuario_dt_criacao',
            //'usuario_dt_alteracao',
            //'usuario_primeiro_logon',
            //'usuario_diaria',
            //'id_coordenadoria',

            [ 'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 9%'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-search" style="color: grey; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['view', 'id' =>$key->pessoa_id ],['title' => 'Ver']);
                    },
                    'update' => function ($model, $key) {

                        return Html::a('<span  class="glyphicon glyphicon-pencil" style="color: darkblue; width:20%; font-size: 1.2em; margin-left: 6%"></span>', ['update', 'id' =>$key->pessoa_id ],['title' => 'Editar']);

                    },
                    'delete' => function ($model, $key) {

                        return Html::a('<span class="glyphicon glyphicon-remove" style="color: red; font-size: 1.2em; margin-left: 3%"></span>', ['empenho-liberar', 'id' =>$key->pessoa_id],[
                            'title' => 'Deletar'
                        ]);

                    },
                ]
            ],
        ],
    ]); ?>
</div>
