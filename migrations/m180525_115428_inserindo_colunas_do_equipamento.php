<?php

use yii\db\Migration;

/**
 * Class m180525_115428_inserindo_colunas_do_equipamento
 */
class m180525_115428_inserindo_colunas_do_equipamento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('portal.equipamento', 'equipamento_pessoa', $this->integer()->notNull());
        $this->addColumn('portal.equipamento', 'equipamento_data', $this->dateTime()->notNull());

        $this->addColumn('portal.entrada', 'entrada_pessoa', $this->integer()->notNull());
        $this->addColumn('portal.entrada', 'entrada_data', $this->dateTime()->notNull());

        $this->addColumn('portal.saida', 'saida_pessoa', $this->integer()->notNull());
        $this->addColumn('portal.saida', 'saida_data', $this->dateTime()->notNull());

        $this->addForeignKey('equipamento_pessoa', 'portal.equipamento', 'equipamento_pessoa', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('entrada_pessoa', 'portal.entrada', 'entrada_pessoa', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('saida_pessoa', 'portal.saida', 'saida_pessoa', 'dados_unico.pessoa', 'pessoa_id');

        $this->insert('portal.setor', ['setor_id' => 16, 'setor_nome' => 'STI', 'setor_status' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('portal.setor', ['setor_id' => 16]);
        $this->dropForeignKey('saida_pessoa', 'portal.equipamento');
        $this->dropForeignKey('entrada_pessoa', 'portal.equipamento');
        $this->dropForeignKey('equipamento_pessoa', 'portal.equipamento');

        $this->dropColumn('portal.saida', 'saida_data');
        $this->dropColumn('portal.saida', 'saida_pessoa');

        $this->dropColumn('portal.entrada', 'entrada_data');
        $this->dropColumn('portal.entrada', 'entrada_pessoa');

        $this->dropColumn('portal.equipamento', 'equipamento_data');
        $this->dropColumn('portal.equipamento', 'equipamento_pessoa');
    }
}
