<?php

use yii\db\Migration;

/**
 * Class m180716_173642_termo_vigilancia_fiscalizacao_animal
 */
class m180716_173642_termo_vigilancia_fiscalizacao_animal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_animal',[
            'vigilancia_fiscalizacao_animal_id'=>$this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_animal_nome'=>$this->string(20),
            'vigilancia_fiscalizacao_animal_st'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('termo.vigilancia_fiscalizacao_animal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_173642_termo_vigilancia_fiscalizacao_animal cannot be reverted.\n";

        return false;
    }
    */
}
