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

        .font-topo {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>

<div class="margin-top-menu">
    <?php
    use app\models\DadosUnicoEstOrganizacional;
    use app\models\DadosUnicoMunicipio;
    use app\models\DadosUnicoPessoa;
    use app\models\DadosUnicoPessoaFisica;
    use app\models\DiariaAcao;
    use app\models\DiariaComprovacao;
    use app\models\DiariaDadosRoteiroMultiplo;
    use app\models\DiariaDadosRoteiroMultiploComprovacao;
    use app\models\DiariaEtapa;
    use app\models\DiariaFinanceiro;
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
    /* @var $modelSearch app\models\DiariasSearch */

    ?>
    <div style="position: absolute">
        <?= Yii::$app->controller->renderPartial('menu'); ?>
    </div>

    <div style="text-align: center">
        <h1 class="font-topo">Diária
            de <?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_nm', 'pessoa_nm'), ['class' => 'form-control col-sm-1']) ?></h1>
    </div>

    <div class="diarias-view" style="margin-left: 209px; margin-top: 74px; ">
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
                <?php
                $dataSolicitacao = date_create($model->diaria_dt_criacao);
                $solicitacao = date_format($dataSolicitacao, "d/m/Y"); ?>
                <td class="borda"><?= $model->diaria_numero; ?></td>
                <td class="borda"><?= $solicitacao . ' ' . $model->diaria_hr_criacao; ?></td>
                <td class="borda"><?= $model->diaria_empenho; ?></td>
                <td class="borda"><?php
                    if (!empty($model->diaria_dt_empenho)) {
                        $date = date_create($model->diaria_dt_empenho);
                        echo date_format($date, "d/m/Y");
                    }
                    ?></td>
                <td class="borda"><?= $model->diaria_processo; ?></td>
                <td class="borda"
                    style="color: red"><?= implode(ArrayHelper::map(DiariaStatus::find()->asArray()->where(['status_id' => $model->diaria_st])->all(), 'status_ds', 'status_ds')) ?></td>
            </tr>
        </table>
        <br>
        <?php
        $financeiro = DiariaFinanceiro::find()->asArray()->where(['diaria_id' => $model->diaria_id])->orderBy(['diaria_financeiro_id' => SORT_DESC])->limit(1)->all();
        if (!empty($financeiro)) { ?>
            <table class='diaria'>
                <tr class='bordaMenu'>
                    <th class='borda'>Data Liquidação</th>
                    <th class='borda'>Hora Liquidação</th>
                    <th class='borda'>Data Execução</th>
                    <th class='borda'>Comprovada em</th>
                </tr>
                <tr>
                    <td><?php $dataFinanceiro = date_create($financeiro[0]['diaria_liquidacao_dt']);
                        echo date_format($dataFinanceiro, "d/m/Y"); ?></td>
                    <td><?php $horaFinanceiro = date_create($financeiro[0]['diaria_liquidacao_hr']);
                        echo date_format($horaFinanceiro, "H:i:s"); ?></td>
                    <td><?php $dataExecucao = date_create($financeiro[0]['diaria_financeiro_dt_execucao']);
                        echo date_format($dataExecucao, "d/m/Y"); ?></td>
                    <td><?php $diariaComprovacao = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all();
                        $dataComprovacao = date_create($diariaComprovacao[0]['diaria_comprovacao_dt']);
                        echo date_format($dataComprovacao, "d/m/Y") . ' ' . $diariaComprovacao[0]['diaria_comprovacao_hr']; ?>
                    </td>
                </tr>
            </table>
            <br>
        <?php } ?>

        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Solicitante</th>
                <th class="borda">Beneficiário</th>
                <th class="borda">CPF</th>
            </tr>
            <tr>
                <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_solicitante}")->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
                <td class="borda"><?= implode(ArrayHelper::map(DadosUnicoPessoaFisica::find()->asArray()->where("pessoa_id = {$model->diaria_beneficiario}")->all(), 'pessoa_fisica_cpf', 'pessoa_fisica_cpf')) ?></td>
            </tr>
        </table>
        <br>
        <?php
        if ($model->qtde_roteiros > 0) {
        $roteiroMultiplo = DiariaDadosRoteiroMultiplo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->orderBy(['controle_roteiro' => SORT_ASC])->all();
        $quantidadeRoteiros = 1;
        foreach ($roteiroMultiplo as $key){ ?>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Roteiro <?= $quantidadeRoteiros; ?></th>
                <?php $quantidadeRoteiros++; ?>
            </tr>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Origem</th>
                <th class="borda">Destino</th>
            </tr>
            <?php
            $arrayRoteiro = ArrayHelper::map(DiariaRoteiro::find()->asArray()->where(['diaria_id' => $model->diaria_id])->andWhere(['controle_roteiro' => $key['controle_roteiro']])->all(), 'roteiro_origem', 'roteiro_origem');
            $arrayRoteiroDestino = ArrayHelper::map(DiariaRoteiro::find()->asArray()->where("diaria_id = {$model->diaria_id}")->andWhere(['controle_roteiro' => $key['controle_roteiro']])->all(), 'roteiro_destino', 'roteiro_destino');
            $index = 0;
            $tamanhoArray = count($arrayRoteiro);
            $newArrayOrigem = array_keys($arrayRoteiro);
            $newArrayDestino = array_keys($arrayRoteiroDestino);

            while ($index < $tamanhoArray) {
                echo "<tr>
                            <td class='borda'>" . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class' => 'form-control col-sm-1']) . " - " . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class' => 'form-control col-sm-1']) . "</td>
                            <td class='borda'>" . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class' => 'form-control col-sm-1']) . " - " . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayDestino[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class' => 'form-control col-sm-1']) . "</td>
                        </tr>";
                $index++;
            } ?>
        </table>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda">Complemento do Roteiro</th>
            </tr>
            <tr>
                <td class="borda"><?= empty(!$key['diaria_roteiro_complemento']) ? $key['diaria_roteiro_complemento'] : " - "; ?></td>
            </tr>
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
                <td class="borda"><?= $key['diaria_dt_saida']; ?></td>
                <td class="borda"><?= $key['diaria_hr_saida']; ?></td>
                <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($key['diaria_dt_saida'])); ?></td>
                <td class="borda"><?= $key['diaria_dt_chegada']; ?></td>
                <td class="borda"><?= $key['diaria_hr_chegada']; ?></td>
                <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($key['diaria_dt_chegada'])); ?></td>
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
                <td class="borda"><?= $key['diaria_desconto'] == 'N' ? 'Não' : 'Sim'; ?></td>
                <td class="borda"><?= $key['diaria_qtde']; ?></td>
                <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.');; ?></td>
                <td class="borda"><?= 'R$ ' . number_format($key['diaria_valor'], 2, ',', '.'); ?></td>
            </tr>
        </table>
        <?php

        $diariaComprovadaRoteiroMultiplo = DiariaDadosRoteiroMultiploComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->andWhere(['controle_roteiro_comprovacao' => $key['controle_roteiro']])->all();
        if (!empty($diariaComprovadaRoteiroMultiplo)){
        ?>
        <table class="diaria">
            <tr class="bordaMenu">
                <th class="borda" style="width: 50%">Partida Realizada</th>
                <th class="borda">Chegada Realizada</th>
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
                <?php //$diariaComprovadaRoteiroMultiplo = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all();
                ?>
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_dt_saida']; ?></td>
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_hr_saida']; ?></td>
                <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_dt_saida'])); ?></td>
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_dt_chegada']; ?></td>
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_hr_chegada']; ?></td>
                <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_dt_chegada'])); ?></td>
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
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_desconto'] == 'S' ? 'Sim' : 'Não'; ?></td>
                <td class="borda"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_qtde']; ?></td>
                <td class="borda"><?= 'R$ ' . number_format($diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_valor_ref'], 2, ',', '.');; ?></td>
                <td class="borda"><?= 'R$ ' . number_format($diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_valor'], 2, ',', '.'); ?></td>
            </tr>

            <table class="diaria">
                <?php
                $valorRestituir = 0;
                $valorReceber = 0;
                switch ($diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_saldo_tipo']) {
                    case "D":
                        $valorRestituir = $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_saldo'];
                        break;
                    case "C":
                        $valorReceber = $diariaComprovadaRoteiroMultiplo[0]['diaria_comprovacao_saldo'];
                        break;
                    default :
                        break;
                } ?>
                <tr class="bordaMenu">
                    <th class="borda" style="width: 16%"> A Restituir</th>
                    <th class="borda" style="width: 16%"> A Receber</th>
                </tr>
                <tr>
                    <td class="borda"><?= 'R$ ' . number_format($valorRestituir, 2, ',', '.'); ?></td>
                    <td class="borda"><?= 'R$ ' . number_format($valorReceber, 2, ',', '.'); ?></td>
                </tr>
            </table>
            <table class='diaria'>
                <tr class='bordaMenu'>
                    <th class='borda'>Resumo</th>
                </tr>
                <tr>
                    <td>
                        <p style="text-align: justify"><?= $diariaComprovadaRoteiroMultiplo[0]['diaria_resumo_comprovacao']; ?></p>
                        <br></td>
                </tr>
            </table>
            <br>
            <?php }


            }
            ?>
            <table class="diaria">
                <tr class="bordaMenu">
                    <th class="borda" style="width: 50%">Quantidade total de diárias: <?= $model->diaria_qtde; ?></th>
                    <th class="borda">Valor Total: <?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.'); ?></th>
                </tr>
            </table>
            <?php } else { ?>
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

                while ($index < $tamanhoArray) {
                    echo "<tr>
                        <td class='borda'>" . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class' => 'form-control col-sm-1']) . " - " . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class' => 'form-control col-sm-1']) . "</td>
                        <td class='borda'>" . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayOrigem[$index]])->all(), 'estado_uf', 'estado_uf'), ['class' => 'form-control col-sm-1']) . " - " . implode(ArrayHelper::map(DadosUnicoMunicipio::find()->asArray()->where(['municipio_cd' => $newArrayDestino[$index]])->all(), 'municipio_ds', 'municipio_ds'), ['class' => 'form-control col-sm-1']) . "</td>
                    </tr>";
                    $index++;
                }

                ?>
            </table>
            <table class="diaria">
                <tr class="bordaMenu">
                    <th class="borda">Complemento do Roteiro</th>
                </tr>
                <tr>
                    <td class="borda"><?= empty(!$model->diaria_roteiro_complemento) ? $model->diaria_roteiro_complemento : " - "; ?></td>
                </tr>
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
                    <td class="borda"><?= $model->diaria_dt_saida; ?></td>
                    <td class="borda"><?= $model->diaria_hr_saida; ?></td>
                    <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_saida)); ?></td>
                    <td class="borda"><?= $model->diaria_dt_chegada; ?></td>
                    <td class="borda"><?= $model->diaria_hr_chegada; ?></td>
                    <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_chegada)); ?></td>
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
                    <td class="borda"><?= $model->diaria_desconto == 'N' ? 'Não' : 'Sim'; ?></td>
                    <td class="borda"><?= $model->diaria_qtde; ?></td>
                    <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.');; ?></td>
                    <td class="borda"><?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.'); ?></td>
                </tr>
            </table>

            <?php
            $diariacomprovada = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all();
            if (!empty($diariacomprovada)){
            ?>
            <table class="diaria">
                <tr class="bordaMenu">
                    <th class="borda" style="width: 50%">Partida Realizada</th>
                    <th class="borda">Chegada Realizada</th>
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
                    <?php $dadosComprovacao = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all(); ?>
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_dt_saida']; ?></td>
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_hr_saida']; ?></td>
                    <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($dadosComprovacao[0]['diaria_comprovacao_dt_saida'])); ?></td>
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_dt_chegada']; ?></td>
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_hr_chegada']; ?></td>
                    <td class="borda"><?= $model->getDiaDaSemana($model->converterStringToData($dadosComprovacao[0]['diaria_comprovacao_dt_chegada'])); ?></td>
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
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_desconto'] == 'S' ? 'Sim' : 'Não'; ?></td>
                    <td class="borda"><?= $dadosComprovacao[0]['diaria_comprovacao_qtde']; ?></td>
                    <td class="borda"><?= 'R$ ' . number_format($dadosComprovacao[0]['diaria_comprovacao_valor_ref'], 2, ',', '.');; ?></td>
                    <td class="borda"><?= 'R$ ' . number_format($dadosComprovacao[0]['diaria_comprovacao_valor'], 2, ',', '.'); ?></td>
                </tr>

                <table class="diaria">
                    <?php
                    $valorRestituir = 0;
                    $valorReceber = 0;
                    switch ($dadosComprovacao[0]['diaria_comprovacao_saldo_tipo']) {
                        case "D":
                            $valorRestituir = $dadosComprovacao[0]['diaria_comprovacao_saldo'];
                            break;
                        case "C":
                            $valorReceber = $dadosComprovacao[0]['diaria_comprovacao_saldo'];
                            break;
                        default :
                            break;
                    } ?>
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%"> A Restituir</th>
                        <th class="borda" style="width: 16%"> A Receber</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= 'R$ ' . number_format($valorRestituir, 2, ',', '.'); ?></td>
                        <td class="borda"><?= 'R$ ' . number_format($valorReceber, 2, ',', '.'); ?></td>
                    </tr>
                </table>
                <?php }
                }

                if (!empty($model->diaria_justificativa_fds)) { ?>
                    <table class='diaria'>
                        <tr class='bordaMenu'>
                            <th class='borda'>Justificativa do Fim de Semana</th>
                        </tr>
                        <tr>
                            <td><p style="text-align: justify"><?= $model->diaria_justificativa_fds; ?></p><br></td>
                        </tr>
                    </table>
                <?php }
                if (!empty($model->diaria_justificativa_feriado)) { ?>
                    <table class='diaria'>
                        <tr class='bordaMenu'>
                            <th class='borda'>Justificativa Feriado</th>
                        </tr>
                        <tr>
                            <td><p style="text-align: justify"><?= $model->diaria_justificativa_feriado; ?></p><br></td>
                        </tr>
                    </table>
                <?php }
                ?>
                <br>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Meio de Transporte</th>
                        <th class="borda" style="width: 16%">Meio de Transporte Observação</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= implode(ArrayHelper::map(DiariaMeioTransporte::find()->asArray()->where(['meio_transporte_id' => $model->meio_transporte_id])->all(), 'meio_transporte_ds', 'meio_transporte_ds'), ['class' => 'form-control col-sm-1']) ?></td>
                        <td class="borda"><?= $model->diaria_transporte_obs; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Motivo</th>
                        <th class="borda" style="width: 16%">Sub-Motivo</th>
                    </tr>
                    <tr>
                        <?php $motivo_id = implode(ArrayHelper::map(DiariaMotivo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all(), 'motivo_id', 'motivo_id'), ['class' => 'form-control col-sm-1']); ?>
                        <?php $sub_motivo_id = implode(ArrayHelper::map(DiariaMotivo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all(), 'sub_motivo_id', 'sub_motivo_id'), ['class' => 'form-control col-sm-1']); ?>
                        <td class="borda"><?= implode(ArrayHelper::map(Motivo::find()->asArray()->where(['motivo_id' => $sub_motivo_id])->all(), 'motivo_ds', 'motivo_ds'), ['class' => 'form-control col-sm-1']) ?></td>
                        <td class="borda"><?= implode(ArrayHelper::map(SubMotivo::find()->asArray()->where(['sub_motivo_id' => $sub_motivo_id])->all(), 'sub_motivo_ds', 'sub_motivo_ds'), ['class' => 'form-control col-sm-1']) ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Descrição</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= $model->diaria_descricao; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Unidade de Custo</th>
                    </tr>
                    <tr>
                        <?php $descricaoUnidadeCusto = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(), 'est_organizacional_ds', 'est_organizacional_ds'), ['class' => 'form-control col-sm-1']);
                        $siglaUnidadeCusto = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(), 'est_organizacional_sigla', 'est_organizacional_sigla'), ['class' => 'form-control col-sm-1']); ?>
                        <td class="borda"><?= $siglaUnidadeCusto . ' - ' . $descricaoUnidadeCusto; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Projeto</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= $model->projeto_cd . ' - ' . implode(ArrayHelper::map(DiariaProjeto::find()->asArray()->where(['projeto_cd' => $model->projeto_cd])->all(), 'projeto_ds', 'projeto_ds'), ['class' => 'form-control col-sm-1']);; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Ação</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= $model->acao_cd . ' - ' . implode(ArrayHelper::map(DiariaAcao::find()->asArray()->where(['acao_cd' => $model->acao_cd])->all(), 'acao_ds', 'acao_ds'), ['class' => 'form-control col-sm-1']);; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Território</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= $model->territorio_cd . ' - ' . implode(ArrayHelper::map(DiariaTerritorio::find()->asArray()->where(['territorio_cd' => $model->territorio_cd])->all(), 'territorio_ds', 'territorio_ds'), ['class' => 'form-control col-sm-1']);; ?></td>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Fonte</th>
                    </tr>
                    <tr>
                        <td class="borda"><?= $model->fonte_cd . ' - ' . implode(ArrayHelper::map(DiariaFonte::find()->asArray()->where(['fonte_cd' => $model->fonte_cd])->all(), 'fonte_ds', 'fonte_ds'), ['class' => 'form-control col-sm-1']);; ?></td>
                    </tr>
                </table>

                <?php if (empty(!$model->etapa_id)) { ?>
                    <table class="diaria">
                        <tr class="bordaMenu">
                            <th class="borda" style="width: 16%">Meta / Etapa</th>
                        </tr>
                        <tr>
                            <td class="borda">
                                <?php
                                $etapaDescricao = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_ds', 'etapa_ds'), ['class' => 'form-control col-sm-1']);
                                $etapaMeta = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_meta', 'etapa_meta'), ['class' => 'form-control col-sm-1']);
                                $etapaCodigo = implode(ArrayHelper::map(DiariaEtapa::find()->asArray()->where(['etapa_id' => $model->etapa_id])->all(), 'etapa_codigo', 'etapa_codigo'), ['class' => 'form-control col-sm-1']);
                                echo $etapaMeta . ' - ' . $etapaCodigo . ' - ' . $etapaDescricao;
                                ?>
                            </td>
                        </tr>
                    </table> <?php
                }
                $historicoCompleto = $model->getHistoricoCompleto();
                $contador = count($historicoCompleto);
                ?>

                <?php $comprovacao = DiariaComprovacao::find()->asArray()->where(['diaria_id' => $model->diaria_id])->all();
                if (!empty($comprovacao) && $model->qtde_roteiros == 0) { ?>
                    <br>
                    <table class='diaria'>
                        <tr class='bordaMenu'>
                            <th class='borda'>Resumo</th>
                        </tr>
                        <tr>
                            <td><p style="text-align: justify"><?= $comprovacao[0]['diaria_comprovacao_resumo']; ?></p>
                                <br></td>
                        </tr>
                    </table>
                <?php } ?>
                <br>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda" style="width: 16%">Histórico</th>
                    </tr>
                </table>
                <table class="diaria">
                    <tr class="bordaMenu">
                        <th class="borda">#</th>
                        <th class="borda">Nome</th>
                        <th class="borda">Data</th>
                        <th class="borda">Hora</th>
                        <th class="borda">Status</th>
                    </tr>
                    <?php
                    foreach ($historicoCompleto as $value) {
                        echo "
            <tr>
                <td><b>{$contador}</b></td>
                <td>{$value['nome']}</td>
                <td>{$value['data']}</td>
                <td>{$value['hora']}</td>
                <td>{$value['status']}</td>
            </tr>";
                        $contador--;
                    } ?>
                </table>
                <br>
    </div>
</div>

