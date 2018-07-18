<?php

use yii\db\Migration;

/**
 * Class m180716_133557_termo_vigilancia_fiscalizacao_proprietario
 */
class m180716_133557_termo_vigilancia_fiscalizacao_proprietario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_proprietario', [
                'vigilancia_fiscalizacao_proprietario_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_proprietario_tipo_id' => $this->integer(),
                'vigilancia_fiscalizacao_proprietario_cpf' => $this->char(14),
                'vigilancia_fiscalizacao_proprietario_cnpj' => $this->char(18),
                'vigilancia_fiscalizacao_proprietario_svo' => $this->string(30)
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_proprietario');
    }
}
