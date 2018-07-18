<?php

use yii\db\Migration;

/**
 * Class m180716_165525_termo_vigilancia_fiscalizacao_veiculo
 */
class m180716_165525_termo_vigilancia_fiscalizacao_veiculo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_veiculo', [
                'vigilancia_fiscalizacao_veiculo_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_veiculo_placa' => $this->char(8),
                'vigilancia_fiscalizacao_veiculo_km_incial' => $this->integer(),
                'vigilancia_fiscalizacao_veiculo_km_final' => $this->integer(),
                'vigilancia_fiscalizacao_veiculo_data_create' => $this->dateTime()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable("termo.vigilancia_fiscalizacao_veiculo");
    }
}
