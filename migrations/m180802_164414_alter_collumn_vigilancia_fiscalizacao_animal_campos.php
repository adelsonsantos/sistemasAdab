<?php

use yii\db\Migration;

/**
 * Class m180802_164414_alter_collumn_vigilancia_fiscalizacao_animal_campos
 */
class m180802_164414_alter_collumn_vigilancia_fiscalizacao_animal_campos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {/*
        $this->renameColumn('termo.vigilancia_fiscalizacao_animal_campos',
                            'vigilancia_fiscalizacao_animal_campos_existentes',
                         'vigilancia_fiscalizacao_animal_campos_femeas_existentes'
        );

        $this->renameColumn('termo.vigilancia_fiscalizacao_animal_campos',
                            'vigilancia_fiscalizacao_animal_campos_femeas_mortos',
                         'vigilancia_fiscalizacao_animal_campos_femeas_mortas'
        );*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('termo.vigilancia_fiscalizacao_animal_campos',
            'vigilancia_fiscalizacao_animal_campos_femeas_existentes',
            'vigilancia_fiscalizacao_animal_campos_existentes'
        );

        $this->renameColumn('termo.vigilancia_fiscalizacao_animal_campos',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortas',
            'vigilancia_fiscalizacao_animal_campos_femeas_mortos'
        );
    }
}
