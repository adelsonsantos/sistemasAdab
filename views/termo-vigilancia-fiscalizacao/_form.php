<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\DiariaCoordenadoria;
use app\models\PortalEscritorio;
use app\models\PortalGerencia;
use yii\helpers\ArrayHelper;
use app\models\TermoVigilanciaFiscalizacao;
use app\models\TermoVigilanciaFiscalizacaoVeiculo;
use app\models\TermoVigilanciaFiscalizacaoEquipeFiscal;


/* @var $this yii\web\View */
/* @var $model app\models\TermoVigilanciaFiscalizacao */
/* @var $form yii\widgets\ActiveForm */
require 'style.php';


?>


<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center"><?= $model->isNewRecord ? 'Cadastrar' : 'Alterar' ?>
            Fiscalização</h1>
    </div>
</div>
<div class="grid">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="diarias-view" style="margin-left: 209px;  ">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">
                    <div class="glyphicon glyphicon-plus"></div>
                    Vigilância e Fiscalização
                </th>
            </tr>
            <td>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'coordenadas_id')->dropDownList(
                            ArrayHelper::map(DiariaCoordenadoria::find()->asArray()->orderBy('nome')->all(), 'id_coordenadoria', 'nome'),
                            [
                                'prompt' => 'Selecione a Coordenadoria',
                                'onchange' => '
            $.get( "' . Url::toRoute('/portal-cordenadoria-gerencia-view/gerencia') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($model, 'gerencia_id') . '" ).html( data );
            }
            );
            '
                            ]
                        )->label('Coordenadoria'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'gerencia_id')->dropDownList(
                            ArrayHelper::map(PortalGerencia::find()->asArray()->where(['id_coordenadoria' => $model->coordenadas_id])->orderBy('ger_nome')->all(), 'ger_id', 'ger_nome'),
                            [
                                'prompt' => 'Selecione a Gerência',
                                'onchange' => '
            $.get( "' . Url::toRoute('/portal-cordenadoria-gerencia-view/escritorio') . '", { id: $(this).val() } )
            .done(function( data ) {
            $( "#' . Html::getInputId($model, 'municipio_id') . '" ).html( data );
            }
            );
            '
                            ])->label('Gerência'); ?>
                    </div>

                    <div class="col-lg-3">
                        <?= $form->field($model, 'municipio_id')->dropDownList(
                            ArrayHelper::map(PortalEscritorio::find()->asArray()->where(['ger_id' => $model->gerencia_id])->orderBy('esc_nome')->all(), 'esc_id', 'esc_nome'),
                            ['prompt' => 'Selecione o Municipio',]) ?>
                    </div>
                </div>


                <?= $this->render('_form-veiculo', [
                    'form' => $form,
                    'model' => $model,
                    'modelsVeiculo' => (empty($modelsVeiculo)) ? [new TermoVigilanciaFiscalizacaoVeiculo] : $modelsVeiculo
                ]); ?>

                <?= $this->render('_form-fiscal', [
                    'form' => $form,
                    'model' => $model,
                    'modelsEquipe' => (empty($modelsEquipe)) ? [new TermoVigilanciaFiscalizacaoEquipeFiscal] : $modelsEquipe
                ]); ?>


                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_local_id')->dropDownList(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoLocal::find()->asArray()->where(['vigilancia_fiscalizacao_local_st' => 1])->orderBy('vigilancia_fiscalizacao_local_nome')->all(), 'vigilancia_fiscalizacao_local_id', 'vigilancia_fiscalizacao_local_nome'), []) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_proprietario_id')->dropDownList(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoProprietario::find()->asArray()->orderBy('vigilancia_fiscalizacao_proprietario_nome')->all(), 'vigilancia_fiscalizacao_proprietario_id', 'vigilancia_fiscalizacao_proprietario_nome'), []) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_produtor_id')->dropDownList(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoProdutor::find()->asArray()->orderBy('vigilancia_fiscalizacao_produtor_nome')->all(), 'vigilancia_fiscalizacao_produtor_id', 'vigilancia_fiscalizacao_produtor_nome'), []) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_status_id')->dropDownList(ArrayHelper::map(\app\models\TermoVigilanciaFiscalizacaoStatus::find()->asArray()->where(['vigilancia_fiscalizacao_status_st' => 1])->orderBy('vigilancia_fiscalizacao_status_nome')->all(), 'vigilancia_fiscalizacao_status_id', 'vigilancia_fiscalizacao_status_nome'), []) ?>
                    </div>
                </div>

                <?= $this->render('_form-atividade', [
                    'form' => $form,
                    'model' => $model,
                    'modelsAtividade' => (empty($modelsAtividade)) ? [new \app\models\TermoVigilanciaFiscalizacaoAtividade] : $modelsAtividade
                ]); ?>

                <?= $this->render('_form-acao', [
                    'form' => $form,
                    'model' => $model,
                    'modelsAcao' => (empty($modelsAcao)) ? [new \app\models\TermoVigilanciaFiscalizacaoAcoes] : $modelsAcao
                ]); ?>

                <?= $this->render('_form-populacao-animal', [
                    'form' => $form,
                    'model' => $model,
                    'modelsPopulacaoAnimal' => (empty($modelsPopulacaoAnimal)) ? [new \app\models\TermoVigilanciaFiscalizacaoPopulacaoAnimal] : $modelsPopulacaoAnimal
                ]); ?>

                <?= $this->render('_form-vacina', [
                    'form' => $form,
                    'model' => $model,
                    'modelsVacina' => (empty($modelsVacina)) ? [new \app\models\TermoVigilanciaFiscalizacaoVacina] : $modelsVacina
                ]); ?>


                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($model, 'vigilancia_fiscalizacao_observacao')->textarea(['rows' => '7']) ?>
                    </div>
                </div>
    </div>

</div>

<table class="diaria" style="width: 100%; margin-top: 30px;">
    <tr class="bordaMenu" style="background-color: #d0d0d0">
        <th class="borda" style="text-align: center; width: 50%">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </th>
        <th class="borda" style="text-align: center; width: 50%">
            <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-default']); ?>
        </th>
    </tr>
</table>

<div id="div1"></div>

<?php ActiveForm::end(); ?>
</td>
</table>
</div>

