<?php

use yii\db\Migration;

/**
 * Class m180717_114211_termo_vigilancia_fiscalizacao_equipe_fiscal
 */
class m180717_114211_termo_vigilancia_fiscalizacao_equipe_fiscal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_equipe_fiscal', [
            'vigilancia_fiscalizacao_equipe_fiscal_id' => $this->primaryKey()->unique()->notNull(),
            'pessoa_id' => $this->integer(),
            'vigilancia_fiscalizacao_id' => $this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_equipe_fiscal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180717_114211_termo_vigilancia_fiscalizacao_equipe_fiscal cannot be reverted.\n";

        return false;
    }
    */
}
