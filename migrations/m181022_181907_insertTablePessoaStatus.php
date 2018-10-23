<?php

use yii\db\Migration;

/**
 * Class m181022_181907_insertTablePessoaStatus
 */
class m181022_181907_insertTablePessoaStatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('dados_unico.pessoa_status',['pessoa_st','pessoa_descricao'],

            [
                [0,'ativo'],
                [1,'inativo']

            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('dados_unico.pessoa_status',['pessoa_st'=>[0,1]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_181907_insertTablePessoaStatus cannot be reverted.\n";

        return false;
    }
    */
}
