<?php

use yii\db\Migration;

/**
 * Class m180730_170306_alterTableProdutorProprietarioAddColumnNome
 */
class m180730_170306_alterTableProdutorProprietarioAddColumnNome extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     /*   $this->addColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_nome',$this->string(80)->notNull());
        $this->addColumn('termo.vigilancia_fiscalizacao_proprietario', 'vigilancia_fiscalizacao_proprietario_nome',$this->string(80)->notNull());
  */  }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('termo.vigilancia_fiscalizacao_produtor', 'vigilancia_fiscalizacao_produtor_nome');
     //   $this->dropColumn('termo.vigilancia_fiscalizacao_proprietario', 'vigilancia_fiscalizacao_proprietario_nome');
    }
}
