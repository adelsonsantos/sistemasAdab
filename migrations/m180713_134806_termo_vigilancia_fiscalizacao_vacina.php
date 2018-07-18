<?php

use yii\db\Migration;

/**
 * Class m180713_134806_termo_vigilancia_fiscalizacao_vacina
 */
class m180713_134806_termo_vigilancia_fiscalizacao_vacina extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('termo.vigilancia_fiscalizacao_vacina', [
            'vigilancia_fiscalizacao_vacina_id' => $this->primaryKey()->unique()->notNull(),
            'vigilancia_fiscalizacao_febre_aftosa_revenda' => $this->integer(),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_revenda' => $this->integer(),
            'vigilancia_fiscalizacao_brucelose_revenda' => $this->integer(),
            'vigilancia_fiscalizacao_outros_revenda' => $this->string(),
            'vigilancia_fiscalizacao_febre_aftosa_nota_fiscal' => $this->string(),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_nota_fiscal' => $this->string(),
            'vigilancia_fiscalizacao_brucelose_nota_fiscal' => $this->string(),
            'vigilancia_fiscalizacao_febre_aftosa_laboratorio_id' => $this->integer(),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_laboratorio_id' => $this->integer(),
            'vigilancia_fiscalizacao_brucelose_laboratorio_id' => $this->integer(),
            'vigilancia_fiscalizacao_outros_laboratorio_id' => $this->integer(),
            'vigilancia_fiscalizacao_febre_aftosa_partida' => $this->string(10),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_partida' => $this->string(10),
            'vigilancia_fiscalizacao_brucelose_partida' => $this->string(10),
            'vigilancia_fiscalizacao_outros_partida' => $this->string(20),
            'vigilancia_fiscalizacao_febre_aftosa_validade' => $this->date(),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_validade' => $this->date(),
            'vigilancia_fiscalizacao_brucelose_validade' => $this->date(),
            'vigilancia_fiscalizacao_outros_validade' => $this->string(),
            'vigilancia_fiscalizacao_febre_aftosa_data_vacinacao' => $this->dateTime(),
            'vigilancia_fiscalizacao_raiva_dos_herbivoros_data_vacinacao' => $this->dateTime(),
            'vigilancia_fiscalizacao_brucelose_data_vacinacao' => $this->dateTime(),
            'vigilancia_fiscalizacao_outros_data_vacinacao' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('termo.vigilancia_fiscalizacao_vacina');
    }
}
