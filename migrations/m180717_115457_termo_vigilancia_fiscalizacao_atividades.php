<?php

use yii\db\Migration;

/**
 * Class m180717_115457_termo_vigilancia_fiscalizacao_atividades
 */
class m180717_115457_termo_vigilancia_fiscalizacao_atividades extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_atividades', [
            'vigilancia_fiscalizacao_atividades_id' => $this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_atividade_id' => $this->integer(),
            'vigilancia_fiscalizacao_id'=> $this->integer()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_atividades');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180717_115457_termo_vigilancia_fiscalizacao_atividades cannot be reverted.\n";

        return false;
    }
    */
}
