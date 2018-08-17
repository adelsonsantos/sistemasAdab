<?php

$js = '
jQuery(".dynamicform_atividade").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_atividade .panel-title-acao").each(function(index) {
        jQuery(this).html("Ação: " + (index + 1))
    });   
});

jQuery(".dynamicform_atividade").on("afterDelete", function(e) {
    jQuery(".dynamicform_acoes .panel-title-acao").each(function(index) {
        jQuery(this).html("Ação: " + (index + 1))
    });
});
';
$this->registerJs($js);


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
    'widgetContainer' => 'dynamicform_atividade',
    'widgetBody' => '.container-atividades',
    'widgetItem' => '.room-atividade',
    'limit' => 3,
    'min' => 1,
    'insertButton' => '.add-atividade',
    'deleteButton' => '.remove-atividade',
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
                <button type="button" id="butao-atividade-add" class="add-atividade btn btn-success btn-xs" onclick="addAtividade();"><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
        </thead>
        <tbody class="container-atividades">
        <?php foreach ($modelsAtividade as $index => $modelAtividade): ?>
            <tr class="room-atividade">
                <td class="vcenter">

                    <?php
                    if (! $modelAtividade->isNewRecord) {
                        //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($modelAtividade, "[{$index}]vigilancia_fiscalizacao_atividade_id")->label(false)->dropDownList(
                                ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAtividade::find()->asArray()->where(['vigilancia_fiscalizacao_atividade_st' => 1])->orderBy('vigilancia_fiscalizacao_atividade_nome')->all(), 'vigilancia_fiscalizacao_atividade_id', 'vigilancia_fiscalizacao_atividade_nome'),
                                [
                                    'prompt' => 'Selecione a Atividade'
                                ]
                                ); ?>
                        </div>
                    </div>

                </td>
                <td class="text-center vcenter" style="width: 90px;">
                    <button type="button" class="remove-atividade btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php DynamicFormWidget::end(); ?>

<script>
    function addAtividade(){

        if(
            document.getElementById('termovigilanciafiscalizacaoatividade-0-vigilancia_fiscalizacao_atividade_id') !== null
            && document.getElementById('termovigilanciafiscalizacaoatividade-1-vigilancia_fiscalizacao_atividade_id') == null
            && document.getElementById('termovigilanciafiscalizacaoatividade-2-vigilancia_fiscalizacao_atividade_id') == null
        ){
            console.log("um");
            $.get( "<?= Url::toRoute('/termo-vigilancia-fiscalizacao/atividade') ?>", {
                id: document.getElementById('termovigilanciafiscalizacaoatividade-0-vigilancia_fiscalizacao_atividade_id').value
            }).done(function( data ) {
                if(document.getElementById('termovigilanciafiscalizacaoatividade-1-vigilancia_fiscalizacao_atividade_id') !== null){
                    document.getElementById('termovigilanciafiscalizacaoatividade-1-vigilancia_fiscalizacao_atividade_id').innerHTML = data;
                }
            });
        }
        if(document.getElementById('termovigilanciafiscalizacaoatividade-0-vigilancia_fiscalizacao_atividade_id') !== null
            && document.getElementById('termovigilanciafiscalizacaoatividade-1-vigilancia_fiscalizacao_atividade_id') !== null
            && document.getElementById('termovigilanciafiscalizacaoatividade-2-vigilancia_fiscalizacao_atividade_id') == null
        ){
            $.get( "<?= Url::toRoute('/termo-vigilancia-fiscalizacao/atividade') ?>", {
                id: document.getElementById('termovigilanciafiscalizacaoatividade-0-vigilancia_fiscalizacao_atividade_id').value,
                id2: document.getElementById('termovigilanciafiscalizacaoatividade-1-vigilancia_fiscalizacao_atividade_id').value
            }).done(function( data ) {
                if(document.getElementById('termovigilanciafiscalizacaoatividade-2-vigilancia_fiscalizacao_atividade_id') !== null) {
                    document.getElementById('termovigilanciafiscalizacaoatividade-2-vigilancia_fiscalizacao_atividade_id').innerHTML = data;
                }
            });
        }
    }
</script>