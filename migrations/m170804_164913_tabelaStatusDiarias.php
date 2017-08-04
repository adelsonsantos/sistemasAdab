<?php

use yii\db\Migration;
use yii\db\pgsql\Schema;

class m170804_164913_tabelaStatusDiarias extends Migration
{
    public function up()
    {
        //Yii migrate/up
            $this->createTable('diaria.status', [
                'status_id' => $this->primaryKey()->unique()->notNull(),
                'status_ds' => $this->string(60)->notNull()
            ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 0,
                    'status_ds' => 'Autorização'
                ]);

                $this->insert('diaria.status',
                [
                    'status_id' => 1,
                    'status_ds' => 'Aprovação'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 2,
                    'status_ds' => 'Empenho'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 3,
                    'status_ds' => 'Execução'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 4,
                    'status_ds' => 'Comprovação'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 5,
                    'status_ds' => 'Aprovação de Comprovação'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 6,
                    'status_ds' => 'Aguardando arquivamento'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 7,
                    'status_ds' => 'Arquivada'
                ]);
                $this->insert('diaria.status',
                [
                    'status_id' => 100,
                    'status_ds' => 'Pré autorizar'
                ]);
                //$this->alterColumn('diaria.status', ['status_id' => $this->integer()->notNull()->unique()])
    }

    public function down()
    {
        //Yii migrate/down
        $this->dropTable('diaria.status');
    }
}
