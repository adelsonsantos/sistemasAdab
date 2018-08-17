<?php
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
    'widgetContainer' => 'dynamicform_acoes',
    'widgetBody' => '.container-acoes',
    'widgetItem' => '.room-acoes',
    'limit' => 3,
    'min' => 1,
    'insertButton' => '.add-acao',
    'deleteButton' => '.remove-acao',
    'model' => $modelsAcao[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'vigilancia_fiscalizacao_acao_id',
        'vigilancia_fiscalizacao_acao_cmp_complentar_qtd'
    ],
]); ?>

<table class="table table-bordered">
    <thead style="background: #c3c3c3">
    <tr>
        <th>Ação</th>
        <th class="text-center">
            <button type="button" id="butao-acao-add" class="add-acao btn btn-success btn-xs" onclick="addAcao();"><span class="glyphicon glyphicon-plus"></span></button>
        </th>
    </tr>
    </thead >
    <tbody class="container-acoes">
    <?php foreach ($modelsAcao as $index => $modelAcao): ?>
        <tr class="room-acoes">
            <td class="vcenter">

                <?php
                if (! $modelAcao->isNewRecord) {
                    //var_dump($modelRota); // echo Html::activeHiddenInput($modelRota, "[{$indexRoteiro}][{$indexRota}]dados_roteiro_id");
                }
                ?>

                <div class="row">
                    <div class="col-lg-1" style="margin-bottom: -50px">
                        <span class="panel-title-acao" style="margin-top: 300px;">Ação: <?= ($index + 1) ?></span>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($modelAcao, "[{$index}]vigilancia_fiscalizacao_acao_id")->dropDownList(
                            ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoAcao::find()->asArray()->where(['vigilancia_fiscalizacao_acao_st' => 1])->orderBy('vigilancia_fiscalizacao_acao_nome')->all(), 'vigilancia_fiscalizacao_acao_id', 'vigilancia_fiscalizacao_acao_nome'),
                            [
                                'prompt' => 'Selecione a ação',
                                'onchange' => '                               
             $.get( "' . Url::toRoute('/termo-vigilancia-fiscalizacao/complementar') . '", { id: $(this).val(), input: $(this).attr("id")} )
            .done(function( data ) {
            var result = JSON.parse(data);           
                if(result.campo_complementar == true){
                    if(document.getElementById(result.input_one) !== null){
                        document.getElementById(result.input_one).style.display = "block";  
                    }
                    if(document.getElementById(result.input_two) !== null){
                        document.getElementById(result.input_two).style.display = "block";  
                    }
                }else{
                    if(document.getElementById(result.input_one) !== null){
                        document.getElementById(result.input_one).style.display = "none";  
                    }
                    if(document.getElementById(result.input_two) !== null){
                        document.getElementById(result.input_two).style.display = "none";  
                    }
                }                    
            }
            );
            '
                            ])->label('');
                        ?>
                    </div>

                    <div id="campo-complementar<?=$index;?>">
                        <div class="col-lg-1" style="margin-bottom: -50px" >
                            <span style="margin-top: 300px;">Quantidade</span>
                        </div>

                        <div class="col-lg-3">
                            <?= $form->field($modelAcao, "[{$index}]vigilancia_fiscalizacao_acao_cmp_complentar_qtd", [])->textInput()->label('');?>
                        </div>
                    </div>
                </div>

            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-acao btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>
<script>
    document.getElementById('campo-complementar0').style.display = "none";


    function addAcao(){

        if(document.getElementById('termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_id') !== null
        && document.getElementById('termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id') == null
        && document.getElementById('termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id') == null
        ){
            $.get( "<?php echo Url::toRoute('/termo-vigilancia-fiscalizacao/acao') ?>", {
                id: document.getElementById('termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_id').value
            }).done(function( data ) {
                if(document.getElementById('termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id') !== null){
                    document.getElementById('termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id').innerHTML = data;
                }
            });
        }
        if(document.getElementById('termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_id') !== null
        && document.getElementById('termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id') !== null
        && document.getElementById('termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id') == null
        ){
            $.get( "<?php echo Url::toRoute('/termo-vigilancia-fiscalizacao/acao') ?>", {
                id: document.getElementById('termovigilanciafiscalizacaoacoes-0-vigilancia_fiscalizacao_acao_id').value,
                id2: document.getElementById('termovigilanciafiscalizacaoacoes-1-vigilancia_fiscalizacao_acao_id').value
            }).done(function( data ) {
                if(document.getElementById('termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id') !== null) {
                    document.getElementById('termovigilanciafiscalizacaoacoes-2-vigilancia_fiscalizacao_acao_id').innerHTML = data;
                }
            });
        }
    }
</script>



