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


?>

<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th>Produtor</th>
    </tr>
    </thead>
    <tbody class="container-atividades">
            <tr class="room-atividade">
            <td class="vcenter">


                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_id')->dropDownList(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoProdutor::find()->asArray()->orderBy('vigilancia_fiscalizacao_produtor_nome')->all(), 'vigilancia_fiscalizacao_produtor_codigo', 'vigilancia_fiscalizacao_produtor_nome'), [
                            'prompt' => 'Selecione a Coordenadoria',
                            'onchange' => '                             
                            console.log($(this).val());  
                            if($(this).val() !== ""){
                                 $.get( "' . Url::toRoute('/termo-vigilancia-fiscalizacao/get-produtor') . '", { id: $(this).val()} )
                                .done(function( data ) {
                                     var result = JSON.parse(data);
                                     console.log(result);
                                });
                            }
                                                                                                                                                                                                           
            '                        ])->label('') ?>
                    </div>
                </div>

            </td>
        </tr>
    </tbody>
</table>