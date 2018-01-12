<?php

use yii\db\Migration;

class m170919_194649_adicionandoEstadoNoRoteiro extends Migration
{
    public function safeUp()
    {
        $this->addColumn('diaria.roteiro', 'uf_roteiro_origem', $this->char(2));
        $this->addColumn('diaria.roteiro', 'uf_roteiro_destino', $this->char(2));
    }

    public function safeDown()
    {
        $this->dropColumn('diaria.roteiro', 'uf_roteiro_origem');
        $this->dropColumn('diaria.roteiro', 'uf_roteiro_destino');
    }
}
