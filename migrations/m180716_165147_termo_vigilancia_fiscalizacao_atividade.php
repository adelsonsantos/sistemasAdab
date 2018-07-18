<?php

use yii\db\Migration;

/**
 * Class m180716_165147_termo_vigilancia_fiscalizacao_atividade
 */
class m180716_165147_termo_vigilancia_fiscalizacao_atividade extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_atividade', [
                'vigilancia_fiscalizacao_atividade_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_atividade_nome' => $this->string(50),
                'vigilancia_fiscalizacao_atividade_st' => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_atividade');
    }
}
