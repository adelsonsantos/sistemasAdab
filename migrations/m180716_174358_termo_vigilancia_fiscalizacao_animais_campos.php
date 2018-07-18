<?php

use yii\db\Migration;

/**
 * Class m180716_174358_termo_vigilancia_fiscalizacao_animais_campos
 */
class m180716_174358_termo_vigilancia_fiscalizacao_animais_campos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_animal_campos', [
            'vigilancia_fiscalizacao_animal_campos_id' => $this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_animal_id' => $this->integer(),
            'vigilancia_fiscalizacao_animal_campos_machos_nascidos' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_machos_mortos' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_machos_existentes' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_machos_vacinados' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_femeas_nascidas' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_existentes' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_quantidade' => $this->boolean(),
            'vigilancia_fiscalizacao_animal_campos_st' => $this->integer()

        ]);
        $this->addForeignKey('vigilancia_fiscalizacao_animal_id',
            'termo.vigilancia_fiscalizacao_animal_campos',
            'vigilancia_fiscalizacao_animal_id',
            'termo.vigilancia_fiscalizacao_animal',
            'vigilancia_fiscalizacao_animal_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('vigilancia_fiscalizacao_animal_id','termo.vigilancia_fiscalizacao_animal_campos');
        $this->dropTable('termo.vigilancia_fiscalizacao_animal_campos');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_174358_termo_vigilancia_fiscalizacao_animais_campos cannot be reverted.\n";

        return false;
    }
    */
}
