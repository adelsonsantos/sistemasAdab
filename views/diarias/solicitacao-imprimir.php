<style>

    @media print {
        .table thead tr {
            background-color: #dcdedd;
        }
    }

    @media print {
        table {
            border-collapse: collapse;
        }
    }

    @media print {
        table, th, td {
            border: 1px solid black;
        }
    }

    @media print {
        .table td {
            height: 25px;
            background-color: white;
        }
    }

    @media print {
        .th-left {
            text-align: left;
            height: 25px;
        }
    }

    @media print {
        #spacer {
            height: 2em;
        }

        /* height of footer + a little extra */
        #footer {
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    }

    @media print {
        fieldset {
            display: block;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 2px groove (internal value);
        }
    }
</style>
<?php
/* @var $model app\models\Diarias */
use app\models\DadosUnicoEstOrganizacional;
use app\models\DadosUnicoEstOrganizacionalFuncionario;
use app\models\DadosUnicoFuncionario;
use app\models\DadosUnicoMunicipio;
use app\models\DadosUnicoPessoa;
use app\models\DadosUnicoPessoaFisica;
use app\models\DiariaAprovacao;
use app\models\DiariaAutorizacao;
use app\models\DiariaDadosRoteiroMultiplo;
use app\models\DiariaRoteiro;
use app\models\Diarias;
use yii\helpers\ArrayHelper; ?>
<table style="height: 50px">
    <tr>
        <td style="width: 20%; text-align: center"><img src="http://localhost/php/sistemasAdab/image/adab.png"
                                                        style="width: 80px; margin-bottom: 10px; margin-top: 10px"></td>
        <td style="width: 600px; text-align: center">
            <h2>Solicitação de Diárias</h2>
        </td>
    </tr>
</table>
<fieldset style="margin-top: 5px">
    <legend>Dados da Diária:</legend>
    <table class="table"
           style="width: 100%; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left">Área Beneficiária</th>
            <th class="th-left">Processo</th>
            <th class="th-left">N° Diária</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(), 'est_organizacional_ds', 'est_organizacional_ds')) ?></td>
            <td><?= $model->diaria_processo; ?></td>
            <td><?= $model->diaria_numero; ?></td>
        </tr>
        </tbody>
    </table>
</fieldset>
<fieldset style="margin-top: 5px">
        <legend>Dados do Beneficiário:</legend>
        <table class="table"
               style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
            <thead>
            <tr class="vendorListHeading">
                <th class="th-left">Nome</th>
                <th class="th-left">Tipo de Servidor</th>
                <th class="th-left">Matrícula</th>
            </tr>
            </thead>
            <tbody>
            <tr class="">
                <td><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
                <td><?= implode(ArrayHelper::map(DadosUnicoFuncionario::find()->innerJoinWith('funcionarioTipo')->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'funcionarioTipo.funcionario_tipo_ds', 'funcionarioTipo.funcionario_tipo_ds')); ?></td>
                <td><?= implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'funcionario_matricula', 'funcionario_matricula')); ?></td>
            </tr>
            </tbody>
        </table>

    <?php $funcionarioId = implode(ArrayHelper::map(DadosUnicoFuncionario::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'funcionario_id', 'funcionario_id'));
    $estOrganizacionalBeneficiarioId = implode(ArrayHelper::map(DadosUnicoEstOrganizacionalFuncionario::find()->where(['funcionario_id' => $funcionarioId])->all(), 'est_organizacional_id', 'est_organizacional_id'));
    $estOrganizacionalDescricao = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->where(['est_organizacional_id' => $estOrganizacionalBeneficiarioId])->all(), 'est_organizacional_ds', 'est_organizacional_ds'));
    $estOrganizacionalCentroDeCusto = implode(ArrayHelper::map(DadosUnicoEstOrganizacional::find()->where(['est_organizacional_id' => $estOrganizacionalBeneficiarioId])->all(), 'est_organizacional_centro_custo_num', 'est_organizacional_centro_custo_num')); ?>
    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%;  height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="width: 315px"> Lotação/ACP</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="white-space: nowrap;"><?= $estOrganizacionalCentroDeCusto . ' - ' . $estOrganizacionalDescricao ?></td>
        </tr>
        </tbody>
    </table>

    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%;  height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="width: 315px"> Cargo/Função</th>
            <th class="th-left">Escolaridade</th>
        </tr>
        </thead>
        <tbody>
        <tr class="">
            <td><?= implode(ArrayHelper::map(DadosUnicoFuncionario::find()->innerJoinWith('cargoTemporario')->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'cargoTemporario.cargo_ds', 'cargoTemporario.cargo_ds')) ?></td>
            <td><?= implode(ArrayHelper::map(DadosUnicoPessoaFisica::find()->innerJoinWith('nivelEscolar')->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'nivelEscolar.nivel_escolar_ds', 'nivelEscolar.nivel_escolar_ds')); ?></td>
        </tr>
        </tbody>
    </table>

    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%;  height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="width: 315px"> CPF</th>
            <th class="th-left">Dados Bancários</th>
        </tr>
        </thead>
        <tbody>
        <tr class="">
            <td><?= implode(ArrayHelper::map(DadosUnicoPessoaFisica::find()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'pessoa_fisica_cpf', 'pessoa_fisica_cpf')); ?></td>
            <td><?= $model->getDadosBancarios($model->diaria_beneficiario); ?></td>
        </tr>
        </tbody>
    </table>

    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%;  height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="width: 315px"> Endereço</th>
        </tr>
        </thead>
        <tbody>
        <tr class="">
            <td><?= $model->getEndereco($model->diaria_beneficiario); ?></td>
        </tr>
        </tbody>
    </table>
</fieldset>
<fieldset style="margin-top: 5px">
    <legend>Projeto:</legend>
    <table class="table"
           style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left">Projeto</th>
            <th class="th-left">Produto</th>
            <th class="th-left">Território</th>
            <th class="th-left">Fonte</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $model->projeto_cd; ?></td>
            <td><?= $model->acao_cd; ?></td>
            <td><?= $model->territorio_cd; ?></td>
            <td><?= $model->fonte_cd; ?></td>
        </tr>
        </tbody>
    </table>
</fieldset>

<fieldset style="margin-top: 5px">
    <legend>Motivo:</legend>
    <table class="table"
           style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left">Motivo da Viagem</th>
            <th class="th-left" style="width: 30%; text-align: center">Meio de Transporte</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: justify;"><p><?= $model->diaria_descricao; ?></p></td>
            <td style="text-align: center"><?= implode(ArrayHelper::map(Diarias::find()->innerJoinWith('meioTransporte')->where(['diaria_id' => $model->diaria_id])->all(), 'meioTransporte.meio_transporte_ds', 'meioTransporte.meio_transporte_ds')); ?></td>
        </tr>
        </tbody>
    </table>
    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%;  height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="width: 315px"> Justificativa do Fim de Semana e Feriado</th>
        </tr>
        </thead>
        <tbody>
        <tr class="">
            <td style="text-align: justify;"><?= $model->diaria_justificativa_feriado . "<br>" . $model->diaria_justificativa_fds; ?></td>
        </tr>
        </tbody>
    </table>
</fieldset>

<?php if ($model->qtde_roteiros > 0){

    $roteiroMultiplo = DiariaDadosRoteiroMultiplo::find()->asArray()->where(['diaria_id' => $model->diaria_id])->orderBy(['controle_roteiro' => SORT_ASC])->all();
    $quantidadeRoteiros = 1;
    foreach ($roteiroMultiplo as $key) {
        ?>


        <fieldset style="margin-top: 5px;">
            <legend style="font-size: 13px">Roteiro <?= $quantidadeRoteiros; ?>:</legend>
            <table class="table"
                   style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
                <thead>
                <tr class="vendorListHeading">
                    <th class="th-left">Destino</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php $rotas = $model->getRoteiroMontarProcesso($model->diaria_id, $key['controle_roteiro']);
                        $lengthArray = sizeof($rotas);
                        foreach ($rotas as $value) {
                            $lengthArray--;
                            echo "<span>{$value['municipio']}-({$value['uf']})</span>";
                            echo $lengthArray === 0 ? "" : "  <span><img src=\"http://localhost/php/sistemasAdab/image/seta.png\" style=\"width: 12px;\"></span>  ";
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
            <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
            <table class="table"
                   style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
                <thead>
                <tr class="vendorListHeading">
                    <th class="th-left" style="white-space: nowrap">Partida Prevista</th>
                    <th class="th-left" style="white-space: nowrap">Chegada Prevista</th>
                    <th class="th-left">Quantidade</th>
                    <th class="th-left" style="white-space: nowrap">Red. 50%</th>
                    <th class="th-left" style="white-space: nowrap">Valor Ref.</th>
                    <th class="th-left">Total</th>
                    <th class="th-left" style="white-space: nowrap">N° Empenho</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="white-space: nowrap; text-align: center">
                        <?= $key['diaria_dt_saida'] . " às " . $key['diaria_hr_saida']; ?>
                        <hr>
                        <?= $model->getDiaDaSemana($model->converterStringToData($key['diaria_dt_saida'])); ?>
                    </td>
                    <td style="white-space: nowrap; text-align: center">
                        <?= $key['diaria_dt_chegada'] . " às " . $key['diaria_hr_chegada']; ?>
                        <hr>
                        <?= $model->getDiaDaSemana($model->converterStringToData($key['diaria_dt_chegada'])); ?>
                    </td>
                    <td style="white-space: nowrap; text-align: center"><?= $key['diaria_qtde']; ?></td>
                    <td style="white-space: nowrap; text-align: center"><?= $key['diaria_desconto'] == 'N' ? "Não" : "Sim"; ?></td>
                    <td style="white-space: nowrap; text-align: center"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.'); ?></td>
                    <td style="white-space: nowrap; text-align: center"><?= 'R$ ' . number_format($key['diaria_valor'], 2, ',', '.'); ?></td>
                    <td style="white-space: nowrap; text-align: center"><?= $key['diaria_empenho']; ?></td>
                </tr>
                </tbody>
            </table>
            <?php $quantidadeRoteiros++; ?>
        </fieldset>


    <?php } ?>

    <fieldset style="margin-top: 5px;">
        <legend>Total:</legend>
        <table class="table"
               style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
            <thead>
            <tr class="vendorListHeading">
                <th class="th-left" style="text-align: center">Total de Diárias: <?= $model->diaria_qtde; ?></th>
                <th class="th-left" style="text-align: center">Valor
                    Total: <?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.'); ?></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </fieldset>
<?php } else{ ?>

<fieldset style="margin-top: 5px;">
    <legend>Roteiro:</legend>

    <table class="table"
           style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left">Destino</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php $rotas = $model->getRoteiroMontarProcessoUnico($model->diaria_id);

                $lengthArray = sizeof($rotas);
                foreach ($rotas as $value) {
                    $lengthArray--;
                    echo "<span>{$value['municipio']}-({$value['uf']})</span>";
                    echo $lengthArray === 0 ? "" : "  <span><img src=\"http://localhost/php/sistemasAdab/image/seta.png\" style=\"width: 12px;\"></span>  ";
                }
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
    <table class="table"
           style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
        <thead>
        <tr class="vendorListHeading">
            <th class="th-left" style="white-space: nowrap">Partida Prevista</th>
            <th class="th-left" style="white-space: nowrap">Chegada Prevista</th>
            <th class="th-left">Quantidade</th>
            <th class="th-left" style="white-space: nowrap">Red. 50%</th>
            <th class="th-left" style="white-space: nowrap">Valor Ref.</th>
            <th class="th-left">Total</th>
            <th class="th-left" style="white-space: nowrap">N° Empenho</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="white-space: nowrap; text-align: center">
                <?= "$model->diaria_dt_saida às $model->diaria_hr_saida"; ?>
                <hr>
                <?= $model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_saida)); ?>
            </td>
            <td style="white-space: nowrap; text-align: center">
                <?= "$model->diaria_dt_chegada às $model->diaria_hr_chegada"; ?>
                <hr>
                <?= $model->getDiaDaSemana($model->converterStringToData($model->diaria_dt_chegada)); ?>
            </td>
            <td style="white-space: nowrap; text-align: center"><?= $model->diaria_qtde; ?></td>
            <td style="white-space: nowrap; text-align: center"><?= $model->diaria_desconto == 'N' ? "Não" : "Sim"; ?></td>
            <td style="white-space: nowrap; text-align: center"><?= 'R$ ' . number_format($model->diaria_valor_ref, 2, ',', '.'); ?></td>
            <td style="white-space: nowrap; text-align: center"><?= 'R$ ' . number_format($model->diaria_valor, 2, ',', '.'); ?></td>
            <td style="white-space: nowrap; text-align: center"><?= $model->diaria_empenho; ?></td>
        </tr>
        </tbody>
    </table>
</fieldset>
<div style="height: 100px">
    <?php } ?>
</div>
<div id="footer" class="col">
    <fieldset style="margin-top: 5px">
        <legend style="font-size: 15px;">Assinatura:</legend>
        <table class="table"
               style="width: 100%; height: 70px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
            <thead>
            <tr class="vendorListHeading">
                <th class="th-left" style="text-align: center; width: 50%">Coordenador da Unidade</th>
                <th class="th-left" style="text-align: center; width: 50%  ">Diretor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center">
                    <br><br>
                    <hr>
                </td>
                <td style="text-align: center">
                    <br><br>
                    <hr>
                </td>
            </tr>
            </tbody>
        </table>
        <div style="background-color: #5a5a5a; height: 12px; margin-right: -12px; margin-left: -12px"></div>
        <?php
        $autorizacao = DiariaAutorizacao::find()->where(['diaria_id' => $model->diaria_id])->orderBy(['diaria_autorizacao_id' => SORT_DESC])->one();
        $date = date_create($autorizacao->diaria_autorizacao_dt);

        $aprovacao = DiariaAprovacao::find()->where(['diaria_id' => $model->diaria_id])->orderBy(['diaria_aprovacao_id' => SORT_DESC])->one();
        $dateAprovacao = date_create($aprovacao->diaria_aprovacao_dt);
        ?>

        <table class="table"
               style="width: 100%; height: 20px; margin-left: -12px; margin-bottom: -11px; margin-right: -12px; font-size: 13px;">
            <tbody>
            <tr class="vendorListHeading">
                <th class="th-left" style="text-align: center; width: 50%"><h6>Data da
                        Autorização: <?= date_format($date, "d/m/Y") . " " . $autorizacao->diaria_autorizacao_hr; ?></h6>
                </th>
                <th class="th-left" style="text-align: center; width: 50%"><h6>Data da
                        Aprovação: <?= date_format($dateAprovacao, "d/m/Y") . " " . $aprovacao->diaria_aprovacao_hr; ?></h6>
                </th>
            </tr>
            </tbody>
        </table>
    </fieldset>
</div>
