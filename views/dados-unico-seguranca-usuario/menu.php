<style>
    .table.table-striped tbody tr:hover
    {
        background: #b0d4f1;
    }

    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
        color: #000000;
        background-color: #82a3bd;
        font-weight: bold;
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
<br>
        <ul class="nav nav-pills nav-stacked" style="width: 200px; text-align: left; margin-top: 75px; margin-left: 5px">
            <li class="active"><?= Html::a('<span class="glyphicon glyphicon-home"></span>  Home', ['/portal-cordenadoria-gerencia-view/index'])?></li>
            <?php
            $arrayMenuCadastro = PublicAuthItemChild::find()->asArray()->innerJoinWith(['item', 'assign'])->where(['sistema_menu' => 1])->andWhere(['user_id' => Yii::$app->user->getId()])->andWhere(['sistema_id' => 1])->all();

            $arrayCadastro = [
                [
                    'parent' => 'administrador',
                    'child' => 'administrador',
                    'item' => [
                        'name' => 'cadastro-funcionário',
                        'type' => 2,
                        'description' => 'Funcionário',
                        'link' => 'coordenadoria/index',
                        'sistema_menu' => 2
                    ],
                    'assign' => [
                        'item_name' => '',
                        'user_id' => 9,
                        'sistema_id' => 2
                    ]

                ],
                [
                    'parent' => 'administrador',
                    'child' => 'administrador',
                    'item' => [
                        'name' => 'filtro - pessoa fisica',
                        'type' => 2,
                        'description' => 'Pessoa Física',
                        'link' => 'gerencia/index',
                        'sistema_menu' => 2
                    ],
                    'assign' => [
                        'item_name' => 'administrador',
                        'user_id' => 9,
                        'sistema_id' => 2
                    ]

                ],
                [
                    'parent' => 'administrador',
                    'child' => 'administrador',
                    'item' => [
                        'name' => 'cadastro-escritorio',
                        'type' => 2,
                        'description' => 'Usuário',
                        'link' => 'escritorio/index',
                        'sistema_menu' => 2
                    ],
                    'assign' => [
                        'item_name' => 'administrador',
                        'user_id' => 9,
                        'sistema_id' => 2
                    ]

                ]
            ];

            if(empty(!$arrayCadastro))
            {
                ?>
                <li id="menu-diarias" onclick="toggle('sub-menu-cadastro')"><?= Html::a('<span class="glyphicon glyphicon-chevron-right" ></span> <label>Cadastro</label>')?></li>
                <?php
                foreach ($arrayCadastro as $key)
                {
                    echo "<li class='sub-menu-cadastro' style='display: none'>". Html::a($key['item']["description"], [$key['item']["link"]],['id' => 'itens'])."</li>";
                }
            }
            ?>
        </ul>