<?php
/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica */
/* @var $modelPessoa app\models\DadosUnicoPessoa */
/* @var $modelEndereco app\models\DadosUnicoEndereco */
/* @var $modelTelefone app\models\DadosUnicoTelefone */


$js = '
jQuery(".dynamicform_acoes").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_acoes .panel-title-acao").each(function(index) {
        jQuery(this).html("Ação: " + (index + 1))
    });
      
    if(document.getElementById("termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id").value == "" && document.getElementById("campo-1--complementar0") !== null){        
        document.getElementById("campo-1--complementar0").style.display = "none";    
    }
     
    if(document.getElementById("termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id") !== null && document.getElementById("termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id").value == "" && document.getElementById("campo-2--complementar0") !== null){        
        document.getElementById("campo-2--complementar0").style.display = "none";    
    }    
});
jQuery(".dynamicform_acoes").on("afterDelete", function(e) {
    jQuery(".dynamicform_acoes .panel-title-acao").each(function(index) {
        jQuery(this).html("Ação: " + (index + 1))
    });
});
';
$this->registerJs($js);
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsEquipe app\models\TermoVigilanciaFiscalizacaoEquipeFiscal */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */

/* @var $form yii\widgets\ActiveForm */

use app\models\DadosUnicoEstado;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_telefone',
    'widgetBody' => '.container-acoes',
    'widgetItem' => '.room-telefone',
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-telefone',
    'deleteButton' => '.remove-acao',
    'model' => $modelsTelefone[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'telefone_num',
        'telefone_ddd',
        'telefone_tipo'
    ],
]); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <table class="table table-bordered">
            <thead style="background: #c3c3c3">
            <tr>
                <th>Telefone</th>
                <th class="text-center">
                    <button type="button" class=" pull-right add-telefone butao-acao-add btn btn-success btn-xs"><i
                                class="fa fa-plus glyphicon glyphicon-plus"></i> Telefone
                    </button>

                </th>
            </tr>
            </thead>
            <tbody class="container-acoes">
            <?php foreach ($modelsTelefone as $index => $modelTelefone): ?>
                <tr class="room-telefone">
                    <td class="vcenter">

                        <?php
                        if (!$modelTelefone->isNewRecord) {
                            //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                        }
                        ?>

                        <div class="row">
                            <div class="col-lg-1" style="margin-bottom: -50px">
                                <span class="panel-title-acao" style="margin-top: 300px;">Tipo: </span>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($modelTelefone, "[{$index}]telefone_tipo")->dropDownList(
                                    ['M' => 'Celular', 'C' => 'Comercial', 'F' => 'Fax', 'R' => 'Residencial'],

                                    [
                                        'prompt' => 'Selecione '
                                    ])->label('');
                                ?>
                            </div>

                            <div id="campo-complementar<?= $index; ?>">
                                <div class="col-lg-1" style="margin-bottom: -50px">
                                    <span style="margin-top: 300px;">DDD</span>
                                </div>

                                <div class="col-lg-1">
                                    <?= $form->field($modelTelefone, "[{$index}]telefone_ddd", [])->textInput()->label(''); ?>

                                </div>
                            </div>


                            <div id="campo-complementar<?= $index; ?>">
                                <div class="col-lg-1" style="margin-bottom: -50px">
                                    <span style="margin-top: 300px;">Número</span>
                                </div>

                                <div class="col-lg-2">
                                    <?= $form->field($modelTelefone, "[{$index}]telefone_num", [])->textInput()->label('');

                                    ?>


                                </div>
                            </div>
                        </div>

                    </td>
                    <td class="text-center vcenter" style="width: 90px;">
                        <button type="button" class="remove-acao btn btn-danger btn-xs"><span
                                    class="glyphicon glyphicon-minus"></span></button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php DynamicFormWidget::end(); ?>


        <div class="col">
            <div class="col-lg-4">
                <?= $form->field($modelPessoa, "pessoa_email", [])->textInput();

                ?>
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>
