<?php

use yii\db\Migration;

/**
 * Class m180717_124620_termo_vigilancia_fiscalizacao_populacao_animal
 */
class m180717_124620_termo_vigilancia_fiscalizacao_populacao_animal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       /* $this->createTable('termo.vigilancia_fiscalizacao_populacao_animal', [
            'vigilancia_fiscalizacao_populacao_animal_id' => $this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_id' => $this->integer(),
            'vigilancia_fiscalizacao_faixa_etaria_id'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_machos_nascidos'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_machos_mortos'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_machos_existentes'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_machos_vacinados'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_femeas_nascidas'=> $this->integer(),
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_femeas_existentes'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_femeas_vacinadas'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_quantidade'=> $this->integer(),
            'vigilancia_fiscalizacao_populacao_animal_st'=> $this->integer(),
            'vigilancia_fiscalizacao_animal_id'=> $this->integer()

        ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('termo.vigilancia_fiscalizacao_populacao_animal');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180717_124620_termo_vigilancia_fiscalizacao_populacao_animal cannot be reverted.\n";

        return false;
    }
    */
}
