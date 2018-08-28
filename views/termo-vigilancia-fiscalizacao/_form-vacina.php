<style>
    #vacina {
        color: #333;
        background-color: #dcdcdc;
        border-color: #ddd;
    }

    #vacina0 {
        color: #333;
        background-color: #e0e0e0;
        border-color: #ddd;
    }
</style>

<?php

use kartik\widgets\DatePicker;


$js = '
jQuery(".dynamicform_vacina").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_vacina .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});

jQuery(".dynamicform_vacina").on("afterDelete", function(e) {
    jQuery(".dynamicform_vacina .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});
';


$this->registerJs($js);
?>
<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsVacina app\models\TermoVigilanciaFiscalizacaoVacina */
/* @var $form yii\widgets\ActiveForm */

use app\models\DadosUnicoEstado;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_vacina',
    'widgetBody' => '.container-vacina',
    'widgetItem' => '.room-vacina',
    'limit' => 1,
    'min' => 1,
    'insertButton' => '.add-vacina',
    'deleteButton' => '.remove-vacina',
    'model' => $modelsVacina[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'vigilancia_fiscalizacao_febre_aftosa_revenda',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda',
        'vigilancia_fiscalizacao_brucelose_revenda',
        'vigilancia_fiscalizacao_outros_revenda',
        'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal',
        'vigilancia_fiscalizacao_brucelose_nota_fiscal',
        'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id',
        'vigilancia_fiscalizacao_brucelose_laboratorio_id',
        'vigilancia_fiscalizacao_outros_laboratorio_id',
        'vigilancia_fiscalizacao_febre_aftosa_partida',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida',
        'vigilancia_fiscalizacao_brucelose_partida',
        'vigilancia_fiscalizacao_outros_partida',
        'vigilancia_fiscalizacao_febre_aftosa_validade',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade',
        'vigilancia_fiscalizacao_brucelose_validade',
        'vigilancia_fiscalizacao_outros_validade',
        'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao',
        'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao',
        'vigilancia_fiscalizacao_brucelose_data_vacinacao',
        'vigilancia_fiscalizacao_outros_data_vacinacao',
    ],
]); ?>


<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th>Vacina
            <button type="button" class=" pull-right btn btn-success btn-xs" onclick="addVacina();">
                <i class="fa fa-plus glyphicon glyphicon-plus"></i> Vacina
            </button>
        </th>
    </tr>
    </thead>
    <tbody class="container-vacina" id="vacina-form">

    <?php foreach ($modelsVacina as $index => $modelVacina): ?>
        <tr class="room-vacina">
            <td class="vcenter">

                <?php
                if (!$modelVacina->isNewRecord) {
                    //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                }
                ?>

                <div class="panel" id="vacina"><!-- widgetBody -->
                    <div class="panel-heading">
                        <fieldset>
                            <legend>Febre Aftosa:</legend>

                            <div class="row">
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_revenda")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_nota_fiscal")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_laboratorio_id")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_partida")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_validade")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose'=>false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_febre_aftosa_data_vacinacao")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose'=>false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="panel" id="vacina"><!-- widgetBody -->
                    <div class="panel-heading">
                        <fieldset>
                            <legend>Raiva dos Herbívoros:</legend>
                            <div class="row">
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_partida")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_validade")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="panel" id="vacina"><!-- widgetBody -->
                    <div class="panel-heading">
                        <fieldset>
                            <legend>Brucelose:</legend>
                            <div class="row">
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_revenda")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_nota_fiscal")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_laboratorio_id")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_partida")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_validade")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_brucelose_data_vacinacao")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="panel" id="vacina"><!-- widgetBody -->
                    <div class="panel-heading">
                        <fieldset>
                            <legend>Outra:</legend>
                            <div class="row">
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_outros_revenda")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_outros_laboratorio_id")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_outros_partida")->textInput()
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_outros_validade")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                                <div class="col-lg-2">
                                    <?= $form->field($modelVacina, "[{$index}]vigilancia_fiscalizacao_outros_data_vacinacao")->widget(DatePicker::classname(), [
                                        'options' => [],
                                        'pluginOptions' => [
                                            'autoclose' => false,
                                            'format' => 'dd/mm/yyyy'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="btn btn-danger btn-xs" onclick="removeVacina();">
                    <span class="glyphicon glyphicon-minus"></span>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>



<script>
    removeVacina();

    function addVacina() {
        document.getElementById("vacina-form").style.display = 'block';
    }

    function removeVacina() {
        document.getElementById("vacina-form").style.display = 'none';
    }
</script>