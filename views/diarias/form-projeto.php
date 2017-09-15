<?php
/* @var $this yii\web\View */
use app\models\DadosUnicoEstOrganizacional;
use app\models\DiariaAcao;
use app\models\DiariaFonte;
use app\models\DiariaMeioTransporte;
use app\models\DiariaProjeto;
use app\models\DiariaTerritorio;
use app\models\Motivo;
use app\models\SubMotivo;
use yii\helpers\ArrayHelper;

/* @var $model app\models\Diarias */
/* @var $modelsRoteiro app\models\DiariaRoteiro */
/* @var $modelsRoteiroMultiplo app\models\DiariaDadosRoteiroMultiplo */
/* @var $modelMotivo app\models\DiariaMotivo */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-5">
                    <?= $form->field($model, 'meio_transporte_id')->dropDownList(
                        ArrayHelper::map(DiariaMeioTransporte::find()->asArray()->where(['meio_transporte_st' => 0])->orderBy('meio_transporte_ds')->all(), 'meio_transporte_id', 'meio_transporte_ds'), ['options' => ['0' => ['selected' => true]]])->label('Meio de Transporte:');
                    ?>
                </div>
                <div class="col-sm-7">
                    <?= $form->field($model, 'diaria_transporte_obs')->textarea(['rows' => 1, 'cols' => 60]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-5">
                    <?= $form->field($modelMotivo, 'motivo_id')->dropDownList(
                        ArrayHelper::map(Motivo::find()->asArray()->where(['motivo_st' => 0])->orderBy('motivo_ds')->all(), 'motivo_id', 'motivo_ds'), ['options' => ['0' => ['selected' => true]]])->label('Motivo');
                    ?>
                </div>
                <div class="col-sm-7">
                    <?php $valueSubMotivo = is_null($modelMotivo['sub_motivo_id']) ? 0 : $modelMotivo['sub_motivo_id'];?>
                    <?= $form->field($modelMotivo, 'sub_motivo_id')->dropDownList(
                        ArrayHelper::map(SubMotivo::find()->asArray()->where(['sub_motivo_st' => 0])->orderBy('sub_motivo_ds')->all(), 'sub_motivo_id', 'sub_motivo_ds'), ['options' => [$valueSubMotivo => ['selected' => true]]])->label('Sub-Motivo');
                    ?>
                </div>
            </div>
            <div class="col">
                <?= $form->field($model, 'diaria_descricao')->textarea(['rows' => 3, 'cols' => 60]);
                ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-body">
            <div class="col">
                <?php $modelUnidadeDeCusto = new  DadosUnicoEstOrganizacional; ?>
                <?= $form->field($model, 'diaria_unidade_custo')->dropDownList(
                    ArrayHelper::map($modelUnidadeDeCusto::find()->asArray()->where(['est_organizacional_centro_custo' => 1])->orderBy('est_organizacional_id')->all(), 'est_organizacional_id',
                        function ($modelUnidadeDeCusto) {
                            return $modelUnidadeDeCusto['est_organizacional_centro_custo_num'] . ' - ' . $modelUnidadeDeCusto['est_organizacional_sigla'] . ' - ' . $modelUnidadeDeCusto['est_organizacional_ds'];
                        }), ['options' => ['0' => ['selected' => true]]])->label('Unidade de Custo');
                ?>
            </div>

           <div class="col">
                <?php $modelProjeto = new  DiariaProjeto; ?>
                <?= $form->field($model, 'projeto_cd')->dropDownList(
                    ArrayHelper::map($modelProjeto::find()->asArray()->where(['projeto_st' => 0])->orderBy('projeto_cd')->all(), 'projeto_cd',
                        function ($modelProjeto) {
                            return $modelProjeto['projeto_cd'] . ' - ' . $modelProjeto['projeto_ds'];
                        }), ['options' => ['0' => ['selected' => true]]])->label('Projeto');
                ?>
            </div>

            <div class="col">
                <?php $modelAcao = new  DiariaAcao; ?>
                <?= $form->field($model, 'acao_cd')->dropDownList(
                    ArrayHelper::map($modelAcao::find()->asArray()->where(['acao_st' => 0])->orderBy('acao_cd')->all(), 'acao_cd',
                        function ($modelProjeto) {
                            return $modelProjeto['acao_cd'] . ' - ' . $modelProjeto['acao_ds'];
                        }), ['options' => ['0' => ['selected' => true]]])->label('Produto');
                ?>
            </div>

            <div class="col">
                <?php $modelTerritorio = new  DiariaTerritorio; ?>
                <?= $form->field($model, 'territorio_cd')->dropDownList(
                    ArrayHelper::map($modelTerritorio::find()->asArray()->where(['territorio_st' => 0])->orderBy('territorio_cd')->all(), 'territorio_cd',
                        function ($modelTerritorio) {
                            return $modelTerritorio['territorio_cd'] . ' - ' . $modelTerritorio['territorio_ds'];
                        }), ['options' => ['0' => ['selected' => true]]])->label('Território');
                ?>
            </div>

            <div class="col">
                <?php $modelFonte = new  DiariaFonte; ?>
                <?= $form->field($model, 'fonte_cd')->dropDownList(
                    ArrayHelper::map($modelFonte::find()->asArray()->where(['fonte_st' => 0])->orderBy('fonte_cd')->all(), 'fonte_cd',
                        function ($modelFonte) {
                            return $modelFonte['fonte_cd'] . ' - ' . $modelFonte['fonte_ds'];
                        }), ['options' => ['0' => ['selected' => true]]])->label('Fonte');
                ?>
            </div>
        </div>
    </div>
</div>