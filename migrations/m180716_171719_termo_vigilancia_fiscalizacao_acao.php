<?php

use yii\db\Migration;

/**
 * Class m180716_171719_termo_vigilancia_fiscalizacao_acao
 */
class m180716_171719_termo_vigilancia_fiscalizacao_acao extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_acao', [
                'vigilancia_fiscalizacao_acao_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_acao_nome' => $this->string(50),
                'vigilancia_fiscalizacao_acao_st' => $this->integer(),
                'vigilancia_fiscalizacao_acao_cmp_complentar' => $this->integer()


            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_acao');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_171719_termo_vigilancia_fiscalizacao_acao cannot be reverted.\n";

        return false;
    }
    */
}
