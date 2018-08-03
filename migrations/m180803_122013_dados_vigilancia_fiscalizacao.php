<?php

use yii\db\Migration;

/**
 * Class m180803_122013_dados_vigilancia_fiscalizacao
 */
class m180803_122013_dados_vigilancia_fiscalizacao extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('termo.vigilancia_fiscalizacao_local',
            ['vigilancia_fiscalizacao_local_id', 'vigilancia_fiscalizacao_local_nome', 'vigilancia_fiscalizacao_local_st'],
        [
            [1, 'Propriedade rural', 1],
            [2, 'Assentamento', 1],
            [3, 'Terra indigena', 1],
            [4, 'Fundo do pasto', 1],
            [5, 'Rodovia/Estrada vivinal'],
            [6, 'Posto fiscalização', 1],
            [7, ''],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            []
        ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180803_122013_dados_vigilancia_fiscalizacao cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180803_122013_dados_vigilancia_fiscalizacao cannot be reverted.\n";

        return false;
    }
    */
}
