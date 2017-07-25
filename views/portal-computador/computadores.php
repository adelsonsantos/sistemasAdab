<?php
/* @var $this yii\web\View */
$this->title = 'Portal Computadores';
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<div class="jumbotron">
    <div class="body-content">
        <h1>FEED api </h1>
        <table>
            <tr>
                <th>com_id</th>
                <th>com_mac</th>
                <th>id_coordenadoria</th>
                <th>ger_id</th>
            </tr>

        <?php $j =  \yii\helpers\Json::decode($data);
        $inicio = 0;
        while ($inicio <= count($j)) :
        ?>
            <tr>
                    <td><?=$j[$inicio]['com_id'];?></td>
                    <td><?=$j[$inicio]['com_mac'];?></td>
                    <td><?=$j[$inicio]['id_coordenadoria'];?></td>
                    <td><?=$j[$inicio]['ger_id'];?></td>
            </tr>
        <?php $inicio++;
        endwhile;
        ?>
        </table>
    </div>
</div>