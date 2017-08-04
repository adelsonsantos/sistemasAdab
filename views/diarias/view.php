<head>
    <style>
        table.diaria {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th.borda {
            border: 0.5px solid #b5b5b5;
            text-align: left;
            padding: 8px;
        }

        tr.bordaMenu {
            background-color: #cecece;
        }
        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<?php
use app\models\DadosUnicoEstOrganizacional;
use app\models\DadosUnicoMunicipio;
use app\models\DadosUnicoPessoa;
use app\models\DadosUnicoPessoaFisica;
use app\models\DiariaAcao;
use app\models\DiariaEtapa;
use app\models\DiariaFonte;
use app\models\DiariaMeioTransporte;
use app\models\DiariaMotivo;
use app\models\DiariaProjeto;
use app\models\DiariaRoteiro;
use app\models\DiariaStatus;
use app\models\DiariaTerritorio;
use app\models\Motivo;
use app\models\SubMotivo;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Diarias */
?>
<div class="diarias-view">
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Número SD</th>
                <th class="borda">Solicitada em</th>
                <th class="borda">Nº Empenho</th>
                <th class="borda">Data Empenho</th>
                <th class="borda">Processo</th>
                <th class="borda">Status</th>
            </tr>
            <tr>
                <td class="borda"><?= $model->diaria_numero; ?></td>
                <td class="borda"><?php
                    $date=date_create($model->diaria_dt_criacao.' '.$model->diaria_hr_criacao);
                    echo date_format($date,"d/m/Y H:i:s");
                    ; ?></td>
                <td class="borda"><?= $model->diaria_empenho; ?></td>
                <td class="borda"><?php $date=date_create($model->diaria_dt_empenho); echo date_format($date,"d/m/Y"); ?></td>
                <td class="borda"><?= $model->diaria_processo; ?></td>
                <td class="borda" style="color: red"><?=implode(ArrayHelper::map(DiariaStatus::find()->asArray()->where(['status_id' => $model->diaria_st])->all(), 'status_ds', 'status_ds'), ['class'=>'form-control col-sm-1'])?></td>
            </tr>
        </table>
        <br>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Solicitante</th>
                <th class="borda">Beneficiário</th>
                <th class="borda">CPF</th>
            </tr>
            <tr>
                <td class="borda"><?=implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_solicitante}")->all(), 'pessoa_nm', 'pessoa_nm'), ['class'=>'form-control col-sm-1'])?></td>
                <td class="borda"><?=implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_nm', 'pessoa_nm'), ['class'=>'form-control col-sm-1'])?></td>
                <td class="borda"><?=implode(ArrayHelper::map(DadosUnicoPessoaFisica::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_fisica_cpf', 'pessoa_fisica_cpf'), ['class'=>'form-control col-sm-1'])?></td>
            </tr>
        </table>
        <br>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Roteiro</th>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Origem</th>
                <th class="borda">Destino</th>
            </tr>
            <?php
            $arrayRoteiro = ArrayHelper::map(DiariaRoteiro::find()->asArray()->where("diaria_id = {$model->diaria_id}")->all(), 'roteiro_origem', 'roteiro_origem');
            $arrayRoteiroDestino = ArrayHelper::map(DiariaRoteiro::find()->asArray()->where("diaria_id = {$model->diaria_id}")->all(), 'roteiro_destino', 'roteiro_destino');
            $index = 0;
            $tamanhoArray = count($arrayRoteiro);
            $newArrayOrigem = array_keys($arrayRoteiro);
            $newArrayDestino = array_keys($arrayRoteiroDestino);

            while ($index < $tamanhoArray){
                echo "<tr>
                        <td class='borda'>".implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class'=>'form-control col-sm-1'])." - ".implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class'=>'form-control col-sm-1'])."</td>
                        <td class='borda'>".implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class'=>'form-control col-sm-1'])." - ".implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayDestino[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class'=>'form-control col-sm-1'])."</td>
                    </tr>";
                $index++;
            }
                ?>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Complemento do Roteiro</th>
            </tr>
            <tr><td class="borda"><?php echo empty(!$model->diaria_roteiro_complemento) ? $model->diaria_roteiro_complemento : " - "; ?></td></tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 50%">Partida Prevista</th>
                <th class="borda">Chegada Prevista</th>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Data</th>
                <th class="borda" style="width: 16%">Hora</th>
                <th class="borda" style="width: 16%">Dia</th>
                <th class="borda" style="width: 16%">Data</th>
                <th class="borda" style="width: 16%">Hora</th>
                <th class="borda" style="width: 16%">Dia</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->diaria_dt_saida;?></td>
                <td class="borda"><?=$model->diaria_hr_saida;?></td>
                <td class="borda"><?=$model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_saida));?></td>
                <td class="borda"><?=$model->diaria_dt_chegada;?></td>
                <td class="borda"><?=$model->diaria_hr_chegada;?></td>
                <td class="borda"><?=$model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_chegada));?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Redução 50%</th>
                <th class="borda" style="width: 16%">Qtde Dárais</th>
                <th class="borda" style="width: 16%">Valor Referência</th>
                <th class="borda" style="width: 16%">Valor</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->diaria_desconto == 'N' ? 'Não' : 'Sim';?></td>
                <td class="borda"><?=$model->diaria_qtde;?></td>
                <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.');;?></td>
                <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.');?></td>
            </tr>
        </table>
        <br>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Meio de Transporte</th>
                <th class="borda" style="width: 16%">Meio de Transporte Observação</th>
            </tr>
            <tr>
                <td class="borda"><?=implode(ArrayHelper::map(DiariaMeioTransporte::find()->asArray()->where(['meio_transporte_id' => $model->meio_transporte_id])->all(), 'meio_transporte_ds', 'meio_transporte_ds'), ['class'=>'form-control col-sm-1'])?></td>
                <td class="borda"><?=$model->diaria_transporte_obs;?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Motivo</th>
                <th class="borda" style="width: 16%">Sub-Motivo</th>
            </tr>
            <tr>
                <?php $motivo_id =  implode(ArrayHelper::map(DiariaMotivo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all(), 'motivo_id', 'motivo_id'), ['class'=>'form-control col-sm-1']);?>
                <?php $sub_motivo_id =  implode(ArrayHelper::map(DiariaMotivo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all(), 'sub_motivo_id', 'sub_motivo_id'), ['class'=>'form-control col-sm-1']);?>
                <td class="borda"><?=implode(ArrayHelper::map(Motivo::find()->asArray()->where(['motivo_id' => $sub_motivo_id])->all(), 'motivo_ds', 'motivo_ds'), ['class'=>'form-control col-sm-1'])?></td>
                <td class="borda"><?=implode(ArrayHelper::map(SubMotivo::find()->asArray()->where(['sub_motivo_id' => $sub_motivo_id])->all(), 'sub_motivo_ds', 'sub_motivo_ds'), ['class'=>'form-control col-sm-1'])?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Descrição</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->diaria_descricao;?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Unidade de Custo</th>
            </tr>
            <tr>
                <?php $descricaoUnidadeCusto = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(), 'est_organizacional_ds', 'est_organizacional_ds'), ['class'=>'form-control col-sm-1']);
                      $siglaUnidadeCusto = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(), 'est_organizacional_sigla', 'est_organizacional_sigla'), ['class'=>'form-control col-sm-1']); ?>
                <td class="borda"><?=$siglaUnidadeCusto.' - '.$descricaoUnidadeCusto; ?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Projeto</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->projeto_cd.' - '.implode(ArrayHelper::map(DiariaProjeto::find()->asArray()->where(['projeto_cd' => $model->projeto_cd])->all(), 'projeto_ds', 'projeto_ds'), ['class'=>'form-control col-sm-1']);; ?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Ação</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->acao_cd.' - '.implode(ArrayHelper::map(DiariaAcao::find()->asArray()->where(['acao_cd' => $model->acao_cd])->all(), 'acao_ds', 'acao_ds'), ['class'=>'form-control col-sm-1']);; ?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Território</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->territorio_cd.' - '.implode(ArrayHelper::map(DiariaTerritorio::find()->asArray()->where(['territorio_cd' => $model->territorio_cd])->all(), 'territorio_ds', 'territorio_ds'), ['class'=>'form-control col-sm-1']);; ?></td>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Fonte</th>
            </tr>
            <tr>
                <td class="borda"><?=$model->fonte_cd.' - '.implode(ArrayHelper::map(DiariaFonte::find()->asArray()->where(['fonte_cd' => $model->fonte_cd])->all(), 'fonte_ds', 'fonte_ds'), ['class'=>'form-control col-sm-1']);; ?></td>
            </tr>
        </table>

    <?php if(empty(!$model->etapa_id) ){ ?>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 16%">Meta / Etapa</th>
            </tr>
            <tr>
                <td class="borda">
                    <?php
                    $etapaDescricao = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_ds', 'etapa_ds'), ['class'=>'form-control col-sm-1']);
                    $etapaMeta = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_meta', 'etapa_meta'), ['class'=>'form-control col-sm-1']);
                    $etapaCodigo = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_codigo', 'etapa_codigo'), ['class'=>'form-control col-sm-1']);
                    echo $etapaMeta.' - '.$etapaCodigo.' - '.$etapaDescricao;
                    ?>
                </td>
            </tr>
        </table> <?php
    }
    ?>
    <br>
</div>
