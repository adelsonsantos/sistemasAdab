<?php

use yii\db\Migration;

/**
 * Class m180716_132054_termo_vigilancia_fiscalizacao_produtor
 */
class m180716_132054_termo_vigilancia_fiscalizacao_produtor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_produtor', [
                'vigilancia_fiscalizacao_produtor_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_produtor_tipo_id' => $this->integer(),
                'vigilancia_fiscalizacao_produtor_cpf' => $this->char(14),
                'vigilancia_fiscalizacao_produtor_cnpj' => $this->char(18),
                'vigilancia_fiscalizacao_produtor_svo' => $this->string(30)
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_produtor');
    }
}