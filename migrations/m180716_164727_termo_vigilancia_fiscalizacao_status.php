<?php

use yii\db\Migration;

/**
 * Class m180716_164727_termo_vigilancia_fiscalizacao_status
 */
class m180716_164727_termo_vigilancia_fiscalizacao_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_status', [
                'vigilancia_fiscalizacao_status_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_status_nome' => $this->string(50),
                'vigilancia_fiscalizacao_status_st' => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_status');
}
}
