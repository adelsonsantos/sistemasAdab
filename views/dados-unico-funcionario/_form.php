<style>
    .grid {
        margin-left: 209px;
    }
</style>

<?php
/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoFuncionario */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelPessoaFisica app\models\DadosUnicoPessoaFisica */
/* @var $modelPessoa app\models\DadosUnicoPessoa */
/* @var $modelNivelTecnico app\models\DadosUnicoNivelTecnico */
/* @var $modelEndereco app\models\DadosUnicoEndereco */
/* @var $modelsTelefone app\models\DadosUnicoTelefone */
/* @var $modelFuncionario app\models\DadosUnicoFuncionario */
/* @var $modelDadosBancarios app\models\DadosUnicoDadosBancarios */
/* @var $modelFuncionarioArquivo app\models\DadosUnicoFuncionarioArquivo */

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div style="position: absolute">
    <?= Yii::$app->controller->renderPartial('menu'); ?>
</div>
<div style="height:95px;">
    <div>
        <h1 class="font-topo" style="text-align: center">Cadastro de Funcionário</h1>
    </div>

    <p style="text-align: right; margin-right: 1%; margin-left: 450px; white-space: nowrap"><strong></strong></p>

</div>
<div class="grid">
    <?php
    $form = ActiveForm::begin(['id' => 'dynamic-form']);

    $htmlDadosPessoais = Yii::$app->controller->renderPartial('_form-dados-pessoais',
        [
            'model' => $model,
            'form' => $form,
            'modelPessoaFisica' => $modelPessoaFisica,
            'modelPessoa' => $modelPessoa,
            'modelNivelTecnico' => $modelNivelTecnico
        ]);

    $endereco = Yii::$app->controller->renderPartial('_form-endereco',
        [
            'model' => $model,
            'form' => $form,
            'modelEndereco' => $modelEndereco

        ]);

    $contato = Yii::$app->controller->renderPartial('_form-contato',
        [
            'model' => $model,
            'form' => $form,
            'modelsTelefone' => (empty($modelsTelefone)) ? [new app\models\DadosUnicoTelefone] : $modelsTelefone,
             'modelPessoa' => $modelPessoa
        ]);

    $funcionario = Yii::$app->controller->renderPartial('_form-funcionario',
        [
            'model' => $model,
            'form' => $form,
            'modelFuncionario' => $modelFuncionario,
            'modelUnidadeLotacao'=> $modelUnidadeLotacao,
            'modelPessoaFisica'=>$modelPessoaFisica,
            'modelDadosBancarios'=>$modelDadosBancarios,
            'modelFuncionarioArquivo'=>$modelFuncionarioArquivo

        ]);


    echo TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'options' => ['style' => 'background-color: #82a3bd;'],
        'items' => [
            [
                'label' => 'Dados Principais',
                'content' => $htmlDadosPessoais,
                'active' => true,
                'options' => ['id' => 'diaria'],
            ],
            [
                'label' => 'Endereço',
                'content' => $endereco,
                'options' => ['id' => 'endereco'],
            ],
            [
                'label' => 'Contato',
                'content' => $contato,
                'options' => ['id' => 'contato'],
            ],

            [
                'label' => 'Informações Organizacionais ',
                'content' => $funcionario,
                'options' => ['id' => 'funcionario'],
            ],

        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div>

