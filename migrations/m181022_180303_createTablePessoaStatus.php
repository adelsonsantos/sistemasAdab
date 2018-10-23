<?php

use yii\db\Migration;

/**
 * Class m181022_180303_createTablePessoaStatus
 */
class m181022_180303_createTablePessoaStatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('dados_unico.pessoa_status',['pessoa_st'=>$this->primaryKey(),'pessoa_descricao'=>$this->string(50)]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('dados_unico.pessoa_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_180303_createTablePessoaStatus cannot be reverted.\n";

        return false;
    }
    */
}
