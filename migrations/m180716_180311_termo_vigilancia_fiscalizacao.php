<?php

use yii\db\Migration;

/**
 * Class m180716_180311_termo_vigilancia_fiscalizacao
 */
class m180716_180311_termo_vigilancia_fiscalizacao extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {/*
        $this->createTable('termo.vigilancia_fiscalizacao', [
            'vigilancia_fiscalizacao_id' => $this->primaryKey()->unique()->notNull(),
            'coordenadas_id' => $this->integer(),
            'gerencia_id' => $this->integer(),
            'municipio_id' => $this->integer(),
            'data_create' => $this->integer(),
            'vigilancia_fiscalizacao_veiculo_id' => $this->integer(),
            'vigilancia_fiscalizacao_status_id' => $this->integer(),
            'vigilancia_fiscalizacao_vacina_id' => $this->integer(),
            'vigilancia_fiscalizacao_observacao' => $this->string(260),
            'vigilancia_fiscalizacao_produtor_id' => $this->integer(),
            'vigilancia_fiscalizacao_proprietario_id' => $this->integer(),
            'vigilancia_fiscalizacao_local_id' => $this->integer()

        ]);


        $this->addForeignKey('vigilancia_fiscalizacao_veiculo_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_veiculo_id',
            'termo.vigilancia_fiscalizacao_veiculo',
            'vigilancia_fiscalizacao_veiculo_id');

        $this->addForeignKey('vigilancia_fiscalizacao_status_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_status_id',
            'termo.vigilancia_fiscalizacao_status',
            'vigilancia_fiscalizacao_status_id');

        $this->addForeignKey('vigilancia_fiscalizacao_vacina_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_vacina_id',
            'termo.vigilancia_fiscalizacao_vacina',
            'vigilancia_fiscalizacao_vacina_id'
        );

        $this->addForeignKey('vigilancia_fiscalizacao_produtor_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_produtor_id',
            'termo.vigilancia_fiscalizacao_produtor',
            'vigilancia_fiscalizacao_produtor_id'
            );
        $this->addForeignKey('vigilancia_fiscalizacao_proprietario_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_proprietario_id',
            'termo.vigilancia_fiscalizacao_proprietario',
            'vigilancia_fiscalizacao_proprietario_id'
            );
        $this->addForeignKey('vigilancia_fiscalizacao_local_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_local_id',
            'termo.vigilancia_fiscalizacao_local',
            'vigilancia_fiscalizacao_local_id');
        $this ->addForeignKey('termo_vigilancia_fiscalizacao_id_acoes',
            'termo.vigilancia_fiscalizacao_acoes',
            'vigilancia_fiscalizacao_id',
            'termo.vigilancia_fiscalizacao',
            'vigilancia_fiscalizacao_id'
        );*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      //  $this->dropForeignKey('vigilancia_fiscalizacao_local_id','termo.vigilancia_fiscalizacao');
        //$this->dropForeignKey('vigilancia_fiscalizacao_proprietario_id','termo.vigilancia_fiscalizacao');
        //$this->dropForeignKey('vigilancia_fiscalizacao_produtor_id','termo.vigilancia_fiscalizacao');
        //$this->dropForeignKey('vigilancia_fiscalizacao_vacina_id','termo.vigilancia_fiscalizacao');
        //$this->dropForeignKey('vigilancia_fiscalizacao_status_id','termo.vigilancia_fiscalizacao');
        //$this->dropForeignKey('vigilancia_fiscalizacao_veiculo_id','termo.vigilancia_fiscalizacao');

      //  $this->dropTable('termo.vigilancia_fiscalizacao');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_180311_termo_vigilancia_fiscalizacao cannot be reverted.\n";

        return false;
    }
    */
}
