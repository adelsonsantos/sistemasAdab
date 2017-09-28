<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use kartik\dialog\DialogAsset;


DialogAsset::register($this);
//$this->registerJs("\$('.add-rota').on('click', function(){BootstrapDialog.alert('I want banana!');});");

$js = '
jQuery(".dynamicform_roteiro_multiplo").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_roteiro_multiplo ").each(function(index) {  
                 
        if (typeof(document.getElementById("roteiro6")) !== "undefined" && document.getElementById("roteiro6") !== null){
          document.getElementById("roteiro6").style.display = "none";
          document.getElementById("rmve6").style.display = "block";
        }                    
    });
      
     ordenaRota();
      
    jQuery(".dynamicform_roteiro_multiplo .panel-title-roteiro").each(function(index) {
        jQuery(this).html("Roteiro: " + (index + 1))
    });        
});

jQuery(".dynamicform_rota").on("beforeInsert", function(e, item) {   
       
});

$(".dynamicform_roteiro_multiplo").on("beforeInsert", function(e, item) {
    
});

jQuery(".dynamicform_rota").on("beforeDelete", function(e) {
    console.log(e);
});

jQuery(".dynamicform_rota").on("limitReached", function(e, item) {
        alert("Limite de Rota atingido");
});

    
';

$this->registerJs($js);

?>

<div class="customer-form">
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_roteiro_multiplo', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.roteiro-item', // required: css class
        'limit' => 7, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-roteiro', // css class
        'deleteButton' => '.remove-roteiro', // css class
        'model' => $modelsRoteiroMultiplo[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'diaria_dt_saida',
            'diaria_hr_saida',
            'diaria_dt_chegada',
            'diaria_hr_chegada',
            'diaria_qtde',
            'diaria_desconto',
            'diaria_valor',
            'diaria_roteiro_complemento',
            'controle_roteiro',
            'dados_roteiro_status'
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-transfer"></i> Roteiros
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsRoteiroMultiplo as $indexRoteiro => $modelRoteiro): ?>
            <div class="roteiro-item" id="item-roteiro<?=$indexRoteiro?>">
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">
                            <span class="panel-title-roteiro">Roteiro: <?= ($indexRoteiro + 1) ?></span>
                        </h3>
                        <div class="pull-right">
                            <button type="button" id="roteiro" class="add-roteiro btn  btn-xs" onclick="verificaId(<?=$indexRoteiro?>)"><i class="glyphicon glyphicon"></i>Adicionar Roteiro</button>
                            <button type="button" id="rmve" class="remove-roteiro btn btn-xs" style="display: none"><i class="glyphicon glyphicon"></i>Remover Roteiro</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (!$modelRoteiro->isNewRecord) {
                            echo Html::activeHiddenInput($modelRoteiro, "[{$indexRoteiro}]id");
                        }
                        ?>
                        <div class="row">
                            <?= $this->render('form-rota', [
                                'form' => $form,
                                'indexRoteiro' => $indexRoteiro,
                                'modelsRoteiro' => $modelsRoteiro[$indexRoteiro],
                            ]) ?>
                        </div>

                        <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_roteiro_complemento")->textInput(['maxlength' => true]) ?>

                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Partida Prevista</th>
                                    <th>Chegada Prevista</th>
                                </tr>
                                </thead>
                                <tbody class="container-rooms2">
                                <tr class="room-item2">
                                    <td class="vcenter">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_dt_saida")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ])->label('Data'); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_hr_saida")->widget(
                                                    TimePicker::classname(), [
                                                    'readonly' => true,
                                                    'pluginOptions' => [
                                                        'minuteStep' => 5,
                                                        'showMeridian' => false,
                                                        'defaultTime' => date('H:i'),
                                                    ]
                                                ])->label('Hora'); ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vcenter">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_dt_chegada")->widget(
                                                    DatePicker::className(), [
                                                    'inline' => false,
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                                ])->label('Data'); ?>
                                            </div>
                                            <div class="col-sm-3">
                                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_hr_chegada")->widget(
                                                    TimePicker::classname(), [
                                                    'readonly' => true,
                                                    'pluginOptions' => [
                                                        'minuteStep' => 5,
                                                        'showMeridian' => false,
                                                        'defaultTime' => date('H:i'),
                                                    ]
                                                ])->label('Hora'); ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-1">
                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_desconto")->checkbox([false => 'N', true => 'S'])->label('Redução 50%', ['style' => 'white-space: nowrap']); ?>
                            </div>

                            <div class="col-sm-2">
                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_qtde")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-2">
                                <?= $form->field($modelRoteiro, "[{$indexRoteiro}]diaria_valor")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-lg-3"></div>

                            <div class="col-lg-1">
                                <button class="pull-right btn btn-info">Calcular</button>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>

    </div>
</div>