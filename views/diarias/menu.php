<style>
    .table.table-striped tbody tr:hover
    {
        background: #acc7b8;
    }

    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #000000;
        background-color: #dcdedd;
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
</style>
<?php
use app\models\PublicAuthItemChild;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariaCoordenadoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diarias';
?>
<script>
   function toggle(className){
       var elements = document.getElementsByClassName(className);
       for (var i = 0; i < elements.length; i++){
           elements[i].style.display = (elements[i].style.display  === "block") ? "none" : "block";
       }
   }
</script>

<?php
    $listaMenuCadastro = [
        [
            'label' => 'Meio de Transporte',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Motivo',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'SubMotivo',
            'link'  => '/diarias/create'
        ]
    ];

    $listaMenuFinanceiro = [
        [
            'label' => 'Executar Ordem',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Arquivar',
            'link'  => '/diarias/create'
        ]
    ];
    $listaMenuDrm = [
        [
            'label' => 'Projeto',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Produto',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Território',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Fonte',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Associar DRM',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Listagem DRM',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Saldo e Recursos',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Saldo de Etapa',
            'link'  => '/diarias/create'
        ]
    ];
    $listaMenuPermissoes = [
        [
            'label' => 'Associar Autorizador por ACP',
            'link'  => '/diarias/create'
        ]
    ];

    $listaMenuConsultaGeral = [
        [
            'label' => 'Consulta Geral',
            'link'  => '/diarias/create'
        ]
    ];

    $listaMenuRelatorio = [
        [
            'label' => 'Diárias por Coordenadoria',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Diárias por Servidor',
            'link'  => '/diarias/create'
        ],
        [
            'label' => 'Ticket Refeição',
            'link'  => '/diarias/create'
        ]
    ];
?>
<br>
        <ul class="nav nav-pills nav-stacked" style="width: 200px; text-align: left; margin-top: 75px; margin-left: 5px">
            <li class="active"><?= Html::a('<span class="glyphicon glyphicon-home"></span>  Home', ['/diarias/index'])?></li>
            <?php
            $arrayMenuCadastro = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 1])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if(empty(!$arrayMenuCadastro))
            {
                ?>
                <li id="menu-diarias" onclick="toggle('sub-menu-cadastro')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Cadastro</label>')?></li>
                <?php
                foreach ($arrayMenuCadastro as $key)
                {
                    echo "<li class='sub-menu-cadastro' style='display: none'>". Html::a($key['item']["description"], [$key['item']["link"]],['id' => 'itens'])."</li>";
                }
            }

            $arrayMenuDiarias = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 2])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if(empty(!$arrayMenuDiarias))
            {
                ?>
                <li id="menu-diarias" onclick="toggle('sub-menu-diarias')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Diárias</label>')?></li>
                <?php
                foreach ($arrayMenuDiarias as $key)
                {
                    echo "<li class='sub-menu-diarias' style='display: none'>". Html::a($key['item']["description"], [$key['item']["link"]],['id' => 'itens'])."</li>";
                }
            }

            $arrayMenuFinanceiro = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 3])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if(empty(!$arrayMenuFinanceiro)) {
                ?>
                <li id="menu-diarias"
                    onclick="toggle('sub-menu-financeiro')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Financeiro</label>') ?></li>
                <?php
                foreach ($arrayMenuFinanceiro as $key) {
                    echo "<li class='sub-menu-financeiro' style='display: none'>" . Html::a($key['item']["description"], [$key['item']["link"]], ['id' => 'itens']) . "</li>";
                }
            }

            $arrayMenuDrm = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 4])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if (empty(!$arrayMenuDrm)) {
                ?>
                <li id="menu-diarias"
                    onclick="toggle('sub-menu-drm')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>DRM</label>') ?></li>
                <?php
                foreach ($arrayMenuDrm as $key) {
                    echo "<li class='sub-menu-drm' style='display: none'>" . Html::a($key['item']["description"], [$key['item']["link"]], ['id' => 'itens']) . "</li>";
                }
            }

            $listaMenuPermissoes = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 5])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if (empty(!$listaMenuPermissoes)) {
                ?>
                <li id="menu-diarias"
                    onclick="toggle('sub-menu-consulta-permissoes')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Permissões</label>') ?></li>
                <?php
                foreach ($listaMenuPermissoes as $key) {
                    echo "<li class='sub-menu-consulta-permissoes' style='display: none'>" . Html::a($key['item']["description"], [$key['item']["link"]], ['id' => 'itens']) . "</li>";
                }
            }


            $listaMenuConsultaGeral = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 6])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if (empty(!$listaMenuConsultaGeral)) {
                ?>
                <li id="menu-diarias"
                    onclick="toggle('sub-menu-consulta-geral')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Consulta Geral</label>') ?></li>
                <?php
                foreach ($listaMenuConsultaGeral as $key) {
                    echo "<li class='sub-menu-consulta-geral' style='display: none'>" . Html::a($key['item']["description"], [$key['item']["link"]], ['id' => 'itens']) . "</li>";
                }
            }

            $listaMenuRelatorio = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 7])->andWhere(['user_id' => Yii::$app->user->getId()])->all();
            if (empty(!$listaMenuRelatorio)) {
                ?>
                <li id="menu-diarias"
                    onclick="toggle('sub-menu-relatorio')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Relatório</label>') ?></li>
                <?php
                foreach ($listaMenuRelatorio as $key) {
                    echo "<li class='sub-menu-relatorio' style='display: none'>" . Html::a($key['item']["description"], [$key['item']["link"]], ['id' => 'itens']) . "</li>";
                }
            }?>
        </ul>