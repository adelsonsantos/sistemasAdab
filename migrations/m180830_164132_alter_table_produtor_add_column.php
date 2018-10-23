<?php

use yii\db\Migration;

/**
 * Class m180830_164132_alter_table_produtor_add_column
 */
class m180830_164132_alter_table_produtor_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {/*
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_codigo', $this->integer());
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_telefone1', $this->string(14));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_telefone2', $this->string(14));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_celular', $this->string(14));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_codigo', $this->integer());
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_nome', $this->string(80));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_latitude', $this->string(18));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_longitude', $this->string(18));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_area', $this->string(50));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_confrontantes', $this->string(255));
        $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_vias_acesso', $this->string(255));
        $this->dropForeignKey('vigilancia_fiscalizacao_proprietario_id','termo.vigilancia_fiscalizacao');
        $this->dropColumn('termo.vigilancia_fiscalizacao', 'vigilancia_fiscalizacao_proprietario_id');
        $this->dropTable('termo.vigilancia_fiscalizacao_proprietario');*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_codigo');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_telefone1');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_telefone2');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_celular');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_codigo');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_nome');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_latitude');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_longitude');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_area');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_confrontantes');
       $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_propriedade_vias_acesso');
    }
}
