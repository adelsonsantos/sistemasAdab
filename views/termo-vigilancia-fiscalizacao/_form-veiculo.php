
<div class="panel panel-default">
    <div class="panel-heading"><h5><i class="fas fa-car"></i> Veiculo</h5></div>
    <div class="panel-body">
        <?php use wbraganca\dynamicform\DynamicFormWidget;
        use yii\bootstrap\Html;

        DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper_veiculo', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items-veiculo', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 1, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item-veiculo', // css class
            'deleteButton' => '.remove-item-veiculo', // css class
            'model' => $modelsVeiculo[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'vigilancia_fiscalizacao_veiculo_placa',
                'vigilancia_fiscalizacao_veiculo_km_inicial',
                'vigilancia_fiscalizacao_veiculo_km_final',
                'vigilancia_fiscalizacao_veiculo_data_create',
            ],
        ]); ?>

        <div class="container-items-veiculo"><!-- widgetContainer -->
            <?php foreach ($modelsVeiculo as $i => $modelVeiculo): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-body">
                        <?php
                        if (! $modelVeiculo->isNewRecord) {
                            echo Html::activeHiddenInput($modelVeiculo, "[{$i}]id");
                        }
                        ?>

                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($modelVeiculo, "[{$i}]vigilancia_fiscalizacao_veiculo_placa")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelVeiculo, "[{$i}]vigilancia_fiscalizacao_veiculo_km_incial")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelVeiculo, "[{$i}]vigilancia_fiscalizacao_veiculo_km_final")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelVeiculo, "[{$i}]vigilancia_fiscalizacao_veiculo_data_create")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>
</div>