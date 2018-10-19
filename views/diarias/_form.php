<?php
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;
use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
require "js.php";


/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelMotivo app\models\DiariaMotivo */
/* @var $form yii\widgets\ActiveForm */
?><style>
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

use yii\helpers\Url;

$js = '
function getMunicipio(valueUf, inputMunicipio, valueMunicipio){
    $.get( "' . Url::toRoute("/diarias/municipio") . '", {
            valueUf: valueUf,
            inputMunicipio: inputMunicipio,
            valueMunicipio :  valueMunicipio  
        }).done(function( data ) {
         var result = JSON.parse(data); 
         document.getElementById(result.input_estado).innerHTML = result.html_estado;
         document.getElementById(result.input_municipio).innerHTML = result.html_municipio;
    });
}




function setUltimoDestino(valueUf, idUltimo, valueMunicipio){

    $.get( "' . Url::toRoute("/diarias/last-destino") . '", {
            valueUf: valueUf,
            idUltimo: idUltimo,
            valueMunicipio :  valueMunicipio  
        }).done(function( data ) {
         var result = JSON.parse(data); 
         console.log(result+"*/")               
         document.getElementById(result.input_estado).innerHTML = result.html_estado;
         document.getElementById(result.input_municipio).innerHTML = result.html_municipio;                
    });
}



jQuery(".dynamicform_rota").on("afterInsert", function(e, item) {    
                                                                                            
});
';



$this->registerJs($js);


?>
<script>
    function getMunicipioOrigem(municipiodestino){

        var municipioOrigem = null;
        switch(municipiodestino) {
            case "diariaroteiro-0-0-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-0-roteiro_origem";
                break;
            case "diariaroteiro-0-1-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-1-roteiro_origem";
                break;
            case "diariaroteiro-0-2-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-2-roteiro_origem";
                break;
            case "diariaroteiro-0-3-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-3-roteiro_origem";
                break;
            case "diariaroteiro-0-4-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-4-roteiro_origem";
                break;
            case "diariaroteiro-0-5-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-5-roteiro_origem";
                break;
            case "diariaroteiro-0-6-roteiro_destino":
                municipioOrigem = "diariaroteiro-0-6-roteiro_origem";
                break;
            case "diariaroteiro-1-0-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-0-roteiro_origem";
                break;
            case "diariaroteiro-1-1-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-1-roteiro_origem";
                break;
            case "diariaroteiro-1-2-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-2-roteiro_origem";
                break;
            case "diariaroteiro-1-3-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-3-roteiro_origem";
                break;
            case "diariaroteiro-1-4-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-4-roteiro_origem";
                break;
            case "diariaroteiro-1-5-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-5-roteiro_origem";
                break;
            case "diariaroteiro-1-6-roteiro_destino":
                municipioOrigem = "diariaroteiro-1-6-roteiro_origem";
                break;
            default:
                municipioOrigem = null;
        }
        return municipioOrigem;
    }


    function getValorUf(id){
        var valueUf = null;
        switch(id) {
            case "diariaroteiro-0-0-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-0-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-1-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-1-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-2-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-2-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-3-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-3-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-4-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-4-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-5-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-5-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-0-6-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-0-6-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-0-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-0-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-1-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-1-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-2-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-2-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-3-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-3-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-4-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-4-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-5-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-5-uf_roteiro_destino").value;
                break;
            case "diariaroteiro-1-6-roteiro_destino":
                valueUf = document.getElementById("diariaroteiro-1-6-uf_roteiro_destino").value;
                break;
            default:
                valueUf = document.getElementById("diariaroteiro-0-0-uf_roteiro_destino").value;
        }
        return valueUf;
    }


    function setUltimoDestino(
        valueUf,
        idUltimo,
        valueMunicipio
    ){
        $.get( 'http://localhost/php/sistemasAdab/web/index.php/diarias/last-destino', {
            valueUf          : valueUf,
            idUltimo         : idUltimo,
            valueMunicipio   :  valueMunicipio
        }).done(function( data ) {
            var result = JSON.parse(data);
            document.getElementById(result.input_estado).innerHTML = result.html_estado;
            document.getElementById(result.input_municipio).innerHTML = result.html_municipio;
        });
    }

    function getMunicipio(valueUf, inputMunicipio, valueMunicipio){
        $.get( 'http://localhost/php/sistemasAdab/web/index.php/diarias/municipio', {
            valueUf: valueUf,
            inputMunicipio: inputMunicipio,
            valueMunicipio :  valueMunicipio
        }).done(function( data ) {
            var result = JSON.parse(data);
            document.getElementById(result.input_estado).innerHTML = result.html_estado;
            document.getElementById(result.input_municipio).innerHTML = result.html_municipio;
        });
    }
    function getUltimoDestino(roteiro){
        console.log(roteiro+"/////");
        dados = {
            valueUf        :  document.getElementById("diariaroteiro-0-0-uf_roteiro_origem").value,
            valueMunicipio :  document.getElementById("diariaroteiro-0-0-roteiro_origem").value,
            idUltimo       :  null
        };

        //Roteiro 0
        if(roteiro === 0){
            if(document.getElementById("diariaroteiro-0-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-6-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-0-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-0-7-roteiro_destino";
            }
        }

        //Roteiro 1
        if(roteiro === 1){
            if(document.getElementById("diariaroteiro-1-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-6-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-1-7-roteiro_destino";
            }
        }

        //Roteiro 2
        if(roteiro === 2){
            if(document.getElementById("diariaroteiro-2-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-0-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-1-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-2-6-roteiro_destino";
            }
        }

        //Roteiro 3
        if(roteiro === 3){
            if(document.getElementById("diariaroteiro-3-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-0-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-3-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-3-6-roteiro_destino";
            }
        }

        //Roteiro 4
        if(roteiro === 4){
            if(document.getElementById("diariaroteiro-4-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-0-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-4-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-4-6-roteiro_destino";
            }
        }

        //Roteiro 5
        if(roteiro === 5){
            if(document.getElementById("diariaroteiro-5-0-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-0-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-1-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-1-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-2-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-2-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-3-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-3-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-4-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-4-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-5-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-5-roteiro_destino";
            }
            if(document.getElementById("diariaroteiro-5-6-roteiro_destino")){
                dados.idUltimo = "diariaroteiro-5-6-roteiro_destino";
            }
        }

        return dados
    }

function t2(roteiro) {
     var response = getUltimoDestino(roteiro);

    setUltimoDestino(
        response.valueUf,
        response.idUltimo,
        response.valueMunicipio);

    validaOrigemDestino(response);

    getMunicipio(document.getElementById("diariaroteiro-0-0-uf_roteiro_destino").value, "diariaroteiro-0-0-roteiro_origem", document.getElementById("diariaroteiro-0-0-roteiro_destino").value);

    if(document.getElementById("diariaroteiro-0-2-roteiro_origem")){
        getMunicipio(document.getElementById("diariaroteiro-0-1-uf_roteiro_destino").value, "diariaroteiro-0-1-roteiro_origem", document.getElementById("diariaroteiro-0-1-roteiro_destino").value);
    }

    if(document.getElementById("diariaroteiro-0-3-roteiro_origem")){
        getMunicipio(document.getElementById("diariaroteiro-0-2-uf_roteiro_destino").value, "diariaroteiro-0-2-roteiro_origem", document.getElementById("diariaroteiro-0-2-roteiro_destino").value);
    }

    if(document.getElementById("diariaroteiro-0-4-roteiro_origem")){
        getMunicipio(document.getElementById("diariaroteiro-0-3-uf_roteiro_destino").value, "diariaroteiro-0-3-roteiro_origem", document.getElementById("diariaroteiro-0-3-roteiro_destino").value);
    }

    if(document.getElementById("diariaroteiro-0-5-roteiro_origem")){
        getMunicipio(document.getElementById("diariaroteiro-0-4-uf_roteiro_destino").value, "diariaroteiro-0-4-roteiro_origem", document.getElementById("diariaroteiro-0-4-roteiro_destino").value);
    }

    if(document.getElementById("diariaroteiro-0-6-roteiro_origem")){
        getMunicipio(document.getElementById("diariaroteiro-0-5-uf_roteiro_destino").value, "diariaroteiro-0-5-roteiro_origem", document.getElementById("diariaroteiro-0-5-roteiro_destino").value);
    }
}

    function teste(id){
        var roteiro = null;
        if(id === "rota" || id === "rota0" || id === "rota00" || id === "rota-0-0"){
            roteiro = 0;
        }else
        if (id === "rota1" || id === "rota11" || id === "rota-1-1"){
            roteiro = 1;
        }else
        if (id === "rota2" || id === "rota22" || id === "rota-2-2"){
            roteiro = 2;
        }else
        if (id === "rota3" || id === "rota33" || id === "rota-3-3"){
            roteiro = 3;
        }else
        if (id === "rota4" || id === "rota44" || id === "rota-4-4"){
            roteiro = 4;
        }else
        if (id === "rota5" || id === "rota55" || id === "rota-5-5"){
            roteiro = 5;
        }
        setTimeout(t2(roteiro), 2000);
    }



    function validaOrigemDestino(response){
        if(response.idUltimo){
            setTimeout(function(){
                if(response.valueMunicipio === document.getElementById(response.idUltimo).value){
                    if(document.getElementById("erro0")){
                        document.getElementById("erro0").style.display = "none";
                    } else if(document.getElementById("erro00")){
                        document.getElementById("erro00").style.display = "none";
                    } else if(document.getElementById("erro-0-0")){
                        document.getElementById("erro-0-0").style.display = "none";
                    }
                }else{
                    if(document.getElementById("erro0")){
                        document.getElementById("erro0").style.display = "block";
                    } else if(document.getElementById("erro00")){
                        document.getElementById("erro00").style.display = "block";
                    } else if(document.getElementById("erro-0-0")){
                        document.getElementById("erro-0-0").style.display = "block";
                    }
                }
            }, 500);
        }
    }

</script>


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

