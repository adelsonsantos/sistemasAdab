<?php

use yii\db\Migration;

/**
 * Class m180716_173014_termo_vigilancia_fiscalizacao_acoes
 */
class m180716_173014_termo_vigilancia_fiscalizacao_acoes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_acoes', [
                'vigilancia_fiscalizacao_acoes_id' => $this->primaryKey()->unique()->notNull(),
                'vigilancia_fiscalizacao_id' => $this->integer(),
                'vigilancia_fiscalizacao_acao_id' => $this->integer(),
                'vigilancia_fiscalizacao_acao_cmp_complentar_qtd' => $this->integer()


            ]
        );
        $this->addForeignKey('vigilancia_fiscalizacao_acao_id',
            'termo.vigilancia_fiscalizacao_acoes',
            'vigilancia_fiscalizacao_acao_id',
            'termo.vigilancia_fiscalizacao_acao',
            'vigilancia_fiscalizacao_acao_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()

    {   $this->dropForeignKey('vigilancia_fiscalizacao_acao_id','termo.vigilancia_fiscalizacao_acoes');
        $this->dropTable('termo.vigilancia_fiscalizacao_acoes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_173014_termo_vigilancia_fiscalizacao_acoes cannot be reverted.\n";

        return false;
    }
    */
}
