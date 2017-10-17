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

    @media print {
        input.largerCheckbox {
            width: 30px;
            height: 30px;
        }
    }

    @media print {
        #ttt {
            glyphicon-unchecked
        }
    }
</style>
<?php
/* @var $model app\models\Diarias */
use app\models\DadosUnicoEstOrganizacional;
use app\models\DadosUnicoPessoa;
use app\models\DiariaEtapa;
use yii\helpers\ArrayHelper; ?>
<table style="height: 50px">
    <tr>
        <td style="width: 25%; text-align: center"><img src="http://localhost/php/sistemasAdab/image/estadobahia.png"
                                                        style="width: 90px; margin-bottom: 10px; margin-top: 10px"></td>
        <td style="width: 600px; text-align: center">
            <h3>GOVERNO DO ESTADO DA BAHIA</h3>
        </td>
    </tr>
</table>


<table style="height: 200px; width: 100%; margin-top: 20px">
    <tr>
        <td style="width: 70%; height: 50px; text-align: left">
            <ul>
                <li>Abertura:</li>
                <hr>
                <li>Data/Hora: <?php $dataHora = date('d/m/Y H:i:s');
                    echo $dataHora; ?></li>
                <hr>
                <li>Responsável: - Matr.: 00001</li>
            </ul>
        </td>
        <td style="width: 30%; height: 50px; text-align: center">
            <table class="table"
                   style="font-size: 13px; ">
                <thead>
                <tr class="vendorListHeading">
                    <th class="th-left" style="height: 60px; width: 300px; text-align: center"><h3>Número do
                            Processo:</h3></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="height: 60px; width: 300px"><h3><?= $model->diaria_processo; ?></h3></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>


<fieldset style="margin-top: 15px">
    <legend>Status:</legend>
    <input type="checkbox" class="largerCheckbox" name="checkBox"> Pre-Liquidacao <br>
    <input type="checkbox" class="largerCheckbox" name="checkBox"> Liquidado <br>
    <input type="checkbox" class="largerCheckbox" name="checkBox"> Pago <br>
    <p>Visto : ___________________________________________</p>
</fieldset>


<?php $etapa = DiariaEtapa::find()->where(['etapa_id' => $model->etapa_id])->all();

if (!empty($etapa)){ ?>

<table class="table" style="font-size: 15px; margin-top: 20px; width: 100%;">
    <thead>
    <tr class="vendorListHeading">
        <th class="th-left" style="height: 30px">CONVÊNIO SUASA N° 794625/2013</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height: 30px">
            <?= "PROJETO: " . $etapa[0]['projeto_id'] . " / FONTE: " . $etapa[0]['fonte_id'] . " / META: " . $etapa[0]['etapa_meta'] . " / ETAPA: " . $etapa[0]['etapa_codigo'];
            }
            ?>

        </td>
    </tr>
    </tbody>
</table>

<table class="table" style="font-size: 15px; margin-top: 20px; width: 100%;">
    <thead>
    <tr class="vendorListHeading">
        <th class="th-left" style="height: 30px">ORGÃO / ENTIDADE DE ORIGEM</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height: 30px">ADAB - AGENCIA DE DEFESA AGROPECUARIA DA BAHIA</td>
    </tr>
    </tbody>
</table>

<table class="table" style="font-size: 15px; margin-top: 20px; width: 100%;">
    <thead>
    <tr class="vendorListHeading">
        <th class="th-left" style="height: 30px">UNIDADE</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php $estOrganizacional = DadosUnicoEstOrganizacional::find()->asArray()->where(['est_organizacional_id' => $model->diaria_unidade_custo])->all(); ?>
        <td style="height: 30px"><?= $estOrganizacional[0]['est_organizacional_sigla'] . ' - ' . $estOrganizacional[0]['est_organizacional_ds']; ?></td>
    </tr>
    </tbody>
</table>

<table class="table" style="font-size: 15px; margin-top: 20px; width: 100%;">
    <thead>
    <tr class="vendorListHeading">
        <th class="th-left" style="height: 30px">AUTOR / INTERESSADO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height: 30px"><?= implode(ArrayHelper::map(DadosUnicoPessoa::find()->asArray()->where(['pessoa_id' => $model->diaria_beneficiario])->all(), 'pessoa_nm', 'pessoa_nm')) ?></td>
    </tr>
    </tbody>
</table>

<table class="table" style="font-size: 15px; margin-top: 20px; width: 100%;">
    <thead>
    <tr class="vendorListHeading">
        <th class="th-left" style="height: 30px">ASSUNTO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height: 30px"><?= "SOLICITAÇÃO DE DIÁRIA - SD / " . $model->diaria_numero; ?></td>
    </tr>
    </tbody>
</table>
