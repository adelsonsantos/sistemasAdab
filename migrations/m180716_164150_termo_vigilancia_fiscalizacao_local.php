<?php

use yii\db\Migration;

/**
 * Class m180716_164150_termo_vigilancia_fiscalizacao_local
 */
class m180716_164150_termo_vigilancia_fiscalizacao_local extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()

    {
        $this->createTable('termo.vigilancia_fiscalizacao_local', [
                'vigilancia_fiscalizacao_local_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_local_nome' => $this->string(50),
                'vigilancia_fiscalizacao_local_st' => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_local');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_164150_termo_vigilancia_fiscalizacao_local cannot be reverted.\n";

        return false;
    }
    */
}
