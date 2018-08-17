<?php
/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
/* @var $modelsAtividade app\models\TermoVigilanciaFiscalizacaoAtividade */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $form yii\widgets\ActiveForm */
use app\models\DadosUnicoEstado;
use app\models\DadosUnicoMunicipio;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;


DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_rota',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 3,
    'min' => 1,
    'insertButton' => '.add-rota',
    'deleteButton' => '.removee',
    'model' => $modelsAtividade[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'vigilancia_fiscalizacao_atividade_id'
    ],
]); ?>

    <table class="table table-bordered">
        <thead style="background: #c3c3c3">
        <tr>
            <th>Atividade</th>
            <th class="text-center">
                <button type="button" id="rota" class="add-rota btn btn-success btn-xs" <!--onclick="getThis(this);"--><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        </thead>
        <tbody class="container-rooms">
        <?php foreach ($modelsAtividade as $index => $modelAtividade): ?>
            <tr class="room-item">
                <td class="vcenter">

                    <?php
                    if (! $modelAtividade->isNewRecord) {
                        //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($modelAtividade, "[{$index}]vigilancia_fiscalizacao_atividade_id")->label(false)->dropDownList(
                                ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAtividade::find()->asArray()->where(['vigilancia_fiscalizacao_atividade_st' => 1])->orderBy('vigilancia_fiscalizacao_atividade_nome')->all(), 'vigilancia_fiscalizacao_atividade_id', 'vigilancia_fiscalizacao_atividade_nome')
                                ); ?>
                        </div>
                    </div>

                </td>
                <td class="text-center vcenter" style="width: 90px;">
                    <button type="button" class="removee btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php DynamicFormWidget::end(); ?>