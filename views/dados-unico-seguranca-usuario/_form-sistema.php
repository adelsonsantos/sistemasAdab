<?php


$js = '
jQuery(".dynamicform_fiscal").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_fiscal .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});

jQuery(".dynamicform_fiscal").on("afterDelete", function(e) {
    jQuery(".dynamicform_fiscal .panel-title-fiscal").each(function(index) {
        jQuery(this).html("Fiscal: " + (index + 1))
    });
});
';
$this->registerJs($js);

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelUsuarioSegurancaUsuario app\models\SegurancaUsuarioTipoUsuario */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $dados app\models\SegurancaTipoUsuario */
/* @var $key app\models\SegurancaSistema */

/* @var $form yii\widgets\ActiveForm */

use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;


DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_fiscal',
    'widgetBody' => '.container-fiscais',
    'widgetItem' => '.room-fiscal',
    'limit' => 1,
    'min' => 1,
    'insertButton' => '.add-fiscal',
    'deleteButton' => '.remove-fiscal',
    'model' => $modelUsuarioSegurancaUsuario[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'tipo_usuario_id'
    ],
]); ?>


<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th><?= $key->sistema_nm; ?>
        </th>
    </tr>
    </thead>
    <tbody class="container-fiscais">


    <tr class="room-fiscal">
        <td class="vcenter">

            <?php
            $valueDefault = 0;
            foreach ($dados as $value) {
                if ($value->sistema_id == $key->sistema_id) {
                    $valueDefault = $value->tipo_usuario_id;
                }
            }
            $newIndex  = $key->sistema_id - 1;


            ?>

            <div class="row">
                <div class="col-lg-1" style="margin-bottom: -50px">
                    <span class="panel-title-fiscal" style="margin-top: 300px;">Perfil:</span>
                </div>
                <div class="col-lg-12">
                    <?= $form->field($modelUsuarioSegurancaUsuario[0], "[{$newIndex}]tipo_usuario_id")->dropDownList(
                        ArrayHelper::map(\app\models\SegurancaTipoUsuario::find()->asArray()->where(['tipo_usuario_st' => 0])->andWhere(['sistema_id' => $key->sistema_id])->orderBy('tipo_usuario_ds')->all(), 'tipo_usuario_id', 'tipo_usuario_ds'),
                        [
                            'prompt' => "Nenhum",
                            'options' =>
                                [$valueDefault => [
                                    'selected' => true
                                ]]
                        ])->label('')
                    ?>
                </div>
            </div>

        </td>
    </tr>

    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>



