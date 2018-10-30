<head>
    <style>
        table.diaria {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th.borda {
            width: auto;
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

        .negrito {
            font-weight: bold
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DadosUnicoSegurancaUsuario */

$this->title = $model->pessoa_id;
$this->params['breadcrumbs'][] = ['label' => 'Dados Unico Seguranca Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p><?="Caro(a) Servidor(a),";?></p>
<p><?="Conforme solicitação , encaminhamos abaixo sua senha:";?></p>

<table class="diaria">
    <tr class="bordaMenu">
        <th class="borda">Login</th>
        <th class="borda">Senha</th>
    </tr>
    <tr>
        <td class="borda"><?=$model->usuario_login;?></td>
        <td class="borda"><?=$model->usuario_senha;?></td>
    </tr>
</table>
<br>
<p class="negrito" style="color: #9e0505">ACESSE O <a href='http://sdadab.ba.gov.br/gestor/Home/Login.php' target='_blank'> Sistema de Diárias</a> DIGITE SEU LOGIN E SENHA</p>

<p class="negrito">A T E N Ç Ã O! Sua senha é pessoal e intransferível</p>

<p class="negrito"> STI - Setor de Tecnologia da Informação</p>

<p class="negrito">Telefones: (71) 3116-7824 / 7861</p>

