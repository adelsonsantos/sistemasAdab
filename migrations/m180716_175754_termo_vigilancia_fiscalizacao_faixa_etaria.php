<?php

use yii\db\Migration;

/**
 * Class m180716_175754_termo_vigilancia_fiscalizacao_faixa_etaria
 */
class m180716_175754_termo_vigilancia_fiscalizacao_faixa_etaria extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_animal_faixa_etaria', [
            'vigilancia_fiscalizacao_animal_faixa_etaria_id' => $this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_animal_faixa_etaria_periodo' => $this->string(50),
            'vigilancia_fiscalizacao_animal_id' => $this->integer()


        ]);
        $this->addForeignKey('termo.vigilancia_fiscalizacao_faixa_etaria',
            'termo.vigilancia_fiscalizacao_faixa_etaria',
            'vigilancia_fiscalizacao_animal_id',
            'termo.vigilancia_fiscalizacao_animal',
            'vigilancia_fiscalizacao_animal_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('termo.vigilancia_fiscalizacao_faixa_etaria', 'termo.vigilancia_fiscalizacao_faixa_etaria');

        $this->dropTable('termo.vigilancia_fiscalizacao_animal_faixa_etaria');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_175754_termo_vigilancia_fiscalizacao_faixa_etaria cannot be reverted.\n";

        return false;
    }
    */
}
