<style>
    .font-topo {
        font-size: 20px;
        font-weight: bold;
    }

    .grid {
        margin-left: 209px;
    }

    #w0-filters {
        background-color: rgba(220, 222, 221, 0);
    }

    .table thead tr {
        background-color: #dcdedd;
    }

    .tambem {
        text-align: right;
    }

</style>
<?php
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelMotivo app\models\DiariaMotivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Solicitar Nova Diária</h1>
        <p class="font-topo" style="text-align: center">

        </p>
    </div>
    <div>
        <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong></strong></p>
    </div>
</div>
<div class="grid">
    <?php

    $form = ActiveForm::begin(['id' => 'dynamic-form']);

    $htmlDiaria = Yii::$app->controller->renderPartial('form-diaria',
        [
            'model' => $model,
            'modelsRoteiro' => (empty($modelsRoteiro)) ? [[new DiariaRoteiro]] : $modelsRoteiro,
            'modelsRoteiroMultiplo' => (empty($modelsRoteiroMultiplo)) ? [new DiariaDadosRoteiroMultiplo] : $modelsRoteiroMultiplo,
            'form' => $form
        ]);

    $projeto = Yii::$app->controller->renderPartial('form-projeto', ['model' => $model, 'form' => $form, 'modelMotivo' => $modelMotivo]);

    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'options' => ['style' => 'background-color: #82a3bd;'],
        'items' => [
            [
                'label' => 'Diária',
                'content' => $htmlDiaria,
                'active' => true,
                'options' => ['id' => 'diaria'],
            ],
            [
                'label' => 'Projeto',
                'content' => $projeto,
                'options' => ['id' => 'projeto'],
            ],
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <script type="application/javascript">



        $("#diariaroteiro-0-0-uf_roteiro_origem").on("change", function(){
            console.log("Adelson3");
        });







        $("#dynamic-form").on("beforeInsert", function(e, item) {
            console.log("beforeInsert");
        });

        async function getThis(as) {
            setTimeout(function () {
                switch (as.id) {
                    case 'rota':
                        $("#diariaroteiro-0-1-roteiro_origem").val($("#diariaroteiro-0-0-roteiro_destino").val());
                        $("#diariaroteiro-0-1-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        console.log(as.id);
                        break;
                    case 'rota0':
                        $("#diariaroteiro-0-1-roteiro_origem").val($("#diariaroteiro-0-0-roteiro_destino").val());
                        $("#diariaroteiro-0-1-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        console.log(as.id);
                        break;
                    case 'rota00':
                        $("#diariaroteiro-0-2-roteiro_origem").val($("#diariaroteiro-0-1-roteiro_destino").val());
                        $("#diariaroteiro-0-2-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        console.log(as.id);
                        break;
                    case 'rota-0-0':
                        $("#diariaroteiro-0-3-roteiro_origem").val($("#diariaroteiro-0-2-roteiro_destino").val());
                        $("#diariaroteiro-0-3-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        document.getElementById('rota-0-0').id = 'rotao';
                        console.log(as.id);
                        break;
                    case 'rotao0':
                        $("#diariaroteiro-0-4-roteiro_origem").val($("#diariaroteiro-0-3-roteiro_destino").val());
                        $("#diariaroteiro-0-4-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        console.log(as.id);
                        break;
                    case 'rotao00':
                        $("#diariaroteiro-0-5-roteiro_origem").val($("#diariaroteiro-0-4-roteiro_destino").val());
                        $("#diariaroteiro-0-5-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        console.log(as.id);
                        break;
                    case 'rotao-0-0':
                        $("#diariaroteiro-0-6-roteiro_origem").val($("#diariaroteiro-0-5-roteiro_destino").val());
                        $("#diariaroteiro-0-6-roteiro_destino").val($("#diariaroteiro-0-0-roteiro_origem").val());
                        $("#roteiro0") !== null ? document.getElementById('roteiro0').id = 'roteiro' : '';
                        console.log(as.id);
                        break;
                    case 'rota11':
                        $("#diariaroteiro-1-1-roteiro_origem").val($("#diariaroteiro-1-0-roteiro_destino").val());
                        $("#diariaroteiro-1-1-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        console.log(as.id);
                        break;
                    case 'rota-1-1':
                        $("#diariaroteiro-1-2-roteiro_origem").val($("#diariaroteiro-1-1-roteiro_destino").val());
                        $("#diariaroteiro-1-2-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        $("#rota-1-1") !== null ? document.getElementById('rota-1-1').id = 'rotao1' : '';
                        console.log(as.id);
                        break;
                    case 'rotao11':
                        $("#diariaroteiro-1-3-roteiro_origem").val($("#diariaroteiro-1-2-roteiro_destino").val());
                        $("#diariaroteiro-1-3-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        console.log(as.id);
                        break;
                    case 'rotao-1-1':
                        $("#diariaroteiro-1-4-roteiro_origem").val($("#diariaroteiro-1-3-roteiro_destino").val());
                        $("#diariaroteiro-1-4-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        $("#rotao-1-1") !== null ? document.getElementById('rotao-1-1').id = 'rotaoo1' : '';
                        console.log(as.id);
                        break;
                    case 'rotaoo11':
                        $("#diariaroteiro-1-5-roteiro_origem").val($("#diariaroteiro-1-4-roteiro_destino").val());
                        $("#diariaroteiro-1-5-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        console.log(as.id);
                        break;
                    case 'rotaoo-1-1':
                        $("#diariaroteiro-1-6-roteiro_origem").val($("#diariaroteiro-1-5-roteiro_destino").val());
                        $("#diariaroteiro-1-6-roteiro_destino").val($("#diariaroteiro-1-0-roteiro_origem").val());
                        $("#roteiro11") !== null ? document.getElementById('roteiro11').id = 'roteiro1' : '';
                        $("#rotaoo-1-1") !== null ? document.getElementById('rotaoo-1-1').id = 'rotaooo1' : '';
                        console.log(as.id);
                        break;
                    case 'rotaooo1':
                        alert("Limite de Rota atingido");
                        console.log(as.id);
                        break;
                    default:
                        console.log("default");
                        console.log(as.id);
                }
            }, 40);
        }

        function getProximaRotaOrigem(ultimoDestino, novaOrigem) {
            var destino = $(ultimoDestino).val();
            $.get("get-rota",  {destino : destino}, function(data){
                var ultimoDestino =  document.getElementById(ultimoDestino);
                if (typeof(origem) !== "undefined" && origem !== null){
                    $(novaOrigem).val(data);
                }
            });
        }

        $("#diariaroteiro-0-0-roteiro_destino").change(function(){
            var destino = $(this).val();
            console.log(this);
            $.get("get-rota", {destino : destino}, function(data){
                var element =  document.getElementById("diariaroteiro-0-1-roteiro_origem");
                if (typeof(element) !== "undefined" && element !== null){
                    $("#diariaroteiro-0-1-roteiro_origem").val(data);
                }
            });
        });

        function verificaId(param) {
            console.log("roteiro" + param);

            switch ("roteiro" + param) {
                case 'roteiro':
                    document.getElementById('roteiro').style.display = 'none';
                    document.getElementById('rmve').style.display = 'block';
                    break;
                case 'roteiro0':
                    document.getElementById('roteiro') !== null ? document.getElementById('roteiro').style.display = 'none' : '';
                    document.getElementById('rmve') !== null ? document.getElementById('rmve').style.display = 'block' : '';
                    break;
                case 'roteiro1':
                    document.getElementById('roteiro1').style.display = 'none';
                    document.getElementById('rmve1').style.display = 'block';
                    break;
                case 'roteiro2':
                    document.getElementById('roteiro2').style.display = 'none';
                    document.getElementById('rmve2').style.display = 'block';
                    break;
                case 'roteiro3':
                    document.getElementById('roteiro3').style.display = 'none';
                    document.getElementById('rmve3').style.display = 'block';
                    break;
                case 'roteiro4':
                    document.getElementById('roteiro4').style.display = 'none';
                    document.getElementById('rmve4').style.display = 'block';
                    break;
                case 'roteiro5':
                    document.getElementById('roteiro5').style.display = 'none';
                    document.getElementById('rmve5').style.display = 'block';
                    break;
                case 'roteiro6':
                    document.getElementById('rmve6').style.display = 'block';
                    break;
                default:
                    console.log("Nenhum resultado" + param);
            }
        }

        function ordenaRota() {
            /// ROTA 0
            var rota07 = document.getElementById('rotao-0-0');
            var rota06 = document.getElementById('rotao00');
            var rota05 = document.getElementById('rotao0');
            var rota04 = document.getElementById('rota-0-0');
            var rota03 = document.getElementById('rota00');
            var rota02 = document.getElementById('rota0');
            var rota01 = document.getElementById('rota');

            if (rota07 !== null) {
                rota07.id = 'rotao-00';
            } else if (rota06 !== null) {
                rota06.id = 'rotao0';
            } else if (rota05 !== null) {
                rota05.id = 'rotao';
            } else if (rota04 !== null) {
                rota04.id = 'rota00';
            } else if (rota03 !== null) {
                rota03.id = 'rota0';
            } else if (rota02 !== null) {
                rota02.id = 'rota';
            }

            /// ROTA 1
            var rota17 = document.getElementById('rotao-0-0');
            var rota16 = document.getElementById('rotao00');
            var rota15 = document.getElementById('rotao0');
            var rota14 = document.getElementById('rotao1');
            var rota13 = document.getElementById('rota-1-1');
            var rota12 = document.getElementById('rota11');
            var rota11 = document.getElementById('rota1');
        }


    </script>

