<?php
require "js.php";


/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */

/* @var $form yii\widgets\ActiveForm */

use app\models\DadosUnicoEstado;
use app\models\DadosUnicoMunicipio;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_rota',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 7,
    'min' => 2,
    'insertButton' => '.add-rota',
    'deleteButton' => '.removee',
    'model' => $modelsRoteiro[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'dados_roteiro_id',
        'roteiro_origem',
        'roteiro_destino',
        'uf_roteiro_origem',
        'uf_roteiro_destino',
        'controle_roteiro',
        'roteiro_id',
        'diaria_id'
    ],
]);

$js = '
function teste(){
alert("testtt");
}
';

    $this->registerJs($js);
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Rota</th>
            <th class="text-center">
                <button type="button" id="rota" class="add-rota btn btn-success btn-xs" onclick="teste($(this).attr('id'));"
                <!--onclick="getThis(this);"--><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        </thead>
        <tbody class="container-rooms">
        <?php foreach ($modelsRoteiro as $indexRota => $modelRota): ?>
            <tr class="room-item">
                <td class="vcenter">

                    <?php
                    if (!$modelRota->isNewRecord) {
                        //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-1" style="width: 60px; margin-top: 5px;"><strong>Origem:</strong></div>
                        <div class="col-lg-1" style="width: 100px">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]uf_roteiro_origem")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoEstado::find()->asArray()->where(['not in', 'estado_uf', ['EX']])->orderBy('estado_uf')->all(), 'estado_uf', 'estado_uf'),
                                [
                                    'options' =>
                                        ['BA' => [
                                            'selected' => true
                                        ]],

                                    'onchange' => '                                                                           
                                          $.get( "' . Url::toRoute("/diarias/set-municipio-com-capital") . '", {
                                            value:   $(this).val(), input: $(this).attr("id")                   
                                            }).done(function( data ) {
                                            var result = JSON.parse(data); 
                                             console.log(result);                                          
                                             document.getElementById(result.input_municipio).innerHTML = result.html;
                                          });
                                  '

                                ]); ?>
                        </div>

                        <div class="col-lg-4" id="rota-destino<?= $indexRota; ?>">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]roteiro_origem")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'),
                                ['options' => [
                                    38490 => [
                                        'selected' => true
                                    ]],
                                    'onchange' => '        
                                     function getValorUf(id){
                                         var valueUf = null;
                                         switch(id) {
                                            case "diariaroteiro-0-0-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-0-0-uf_roteiro_origem").value;
                                                break;
                                            case "diariaroteiro-0-1-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-0-1-uf_roteiro_origem").value;
                                                break;
                                            case "diariaroteiro-0-2-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-0-2-uf_roteiro_origem").value;
                                                break;
                                            case "diariaroteiro-1-0-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-1-0-uf_roteiro_origem").value;
                                                break;
                                            case "diariaroteiro-1-1-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-1-1-uf_roteiro_origem").value;
                                                break;
                                            case "diariaroteiro-1-2-roteiro_origem":
                                                valueUf = document.getElementById("diariaroteiro-1-2-uf_roteiro_origem").value;
                                                break;
                                            default:
                                                valueUf = document.getElementById("diariaroteiro-0-3-uf_roteiro_origem").value;
                                         }
                                         console.log(valueUf);
                                         return valueUf;
                                }

                                 $.get( "' . Url::toRoute("/diarias/valida") . '", {
                                                valueUf: getValorUf($(this).attr("id")),
                                                inputMunicipio: $(this).attr("id"),
                                                valueMunicipio : $(this).val()  
                                            }).done(function( data ) {
                                             var result = JSON.parse(data); 
                                             console.log(result);
                                             if(document.getElementById(result.input_estado) && document.getElementById(result.input_municipio)){ 
                                                 document.getElementById(result.input_estado).innerHTML = result.html_estado;
                                                 document.getElementById(result.input_municipio).innerHTML = result.html_municipio;
                                             }
                                             
    });'
                                ]); ?>
                        </div>

                        <div class="col-lg-1" style="width: 60px; margin-top: 5px;"><strong>Destino:</strong></div>
                        <div class="col-lg-1" style="width: 100px">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]uf_roteiro_destino")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoEstado::find()->asArray()->where(['not in', 'estado_uf', ['EX']])->orderBy('estado_uf')->all(), 'estado_uf', 'estado_uf'),
                                [
                                    'options' =>
                                        ['BA' => [
                                            'selected' => true
                                        ]],

                                    'onchange' => '                                                                                                            
                                          $.get( "' . Url::toRoute("/diarias/set-municipio-com-capital") . '", {
                                            value:  $(this).val(), input: $(this).attr("id")                   
                                            }).done(function( data ) {
                                            var result = JSON.parse(data);                                                                                  
                                             document.getElementById(result.input_municipio).innerHTML = result.html;
                                          });                                                                                                                                                          
                                    '
                                ]

                            ); ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($modelRota, "[{$indexRoteiro}][{$indexRota}]roteiro_destino")->label(false)->dropDownList(
                                ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['estado_uf' => 'BA'])->orderBy('municipio_ds')->all(), 'municipio_cd', 'municipio_ds'),
                                [
                                'onchange' => '                                 
                               
                                
                                                       
                               


                                 $.get( "' . Url::toRoute("/diarias/municipio") . '", {
                                                valueUf: getValorUf($(this).attr("id")),
                                                inputMunicipio: $(this).attr("id"),
                                                valueMunicipio :  $(this).val()  
                                            }).done(function( data ) {
                                             var result = JSON.parse(data); 
                                             if(document.getElementById(result.input_estado) && document.getElementById(result.input_municipio)){ 
                                                 document.getElementById(result.input_estado).innerHTML = result.html_estado;
                                                 document.getElementById(result.input_municipio).innerHTML = result.html_municipio;
                                             }
                                             console.log(result.input_municipio);
                                             validaOrigemDestino(result.input_municipio);
    }); 
                           var result = getMunicipioOrigem($(this).attr("id"));                            
                           var tt = document.getElementById(result).value+"--"+document.getElementById($(this).attr("id")).value;                            
                            
                            if(document.getElementById(result).value == document.getElementById($(this).attr("id")).value){
                                alert("ORIGEM e DESTINO são iguais.");                               
                            }
                            '
                                ]); ?>
                        </div>
                    </div>

                </td>
                <td class="text-center vcenter" style="width: 90px;">
                    <button type="button" class="removee btn btn-danger btn-xs"><span
                                class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <div class="panel-group" id="erro">
        <div class="panel panel-danger" style="background-color: #c77b7b; text-align: center">
            <div class="panel-body">A cidade FINAL deve COINCIDIR com a cidade INICIAL!</div>
        </div>
    </div>

<?php DynamicFormWidget::end(); ?>