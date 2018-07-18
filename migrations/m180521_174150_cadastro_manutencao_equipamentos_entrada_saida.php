<?php

use yii\db\Migration;

/**
 * Class m180521_174150_cadastro_manutencao_equipamentos_entrada_saida
 */
class m180521_174150_cadastro_manutencao_equipamentos_entrada_saida extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('portal.tombo', [
            'tombo_id' => $this->primaryKey()->unique()->notNull(),
            'tombo_imei' => $this->string(60)->notNull(),
            'tombo_status' => $this->integer()
        ]);

        $this->createTable('portal.setor', [
            'setor_id' => $this->primaryKey()->unique()->notNull(),
            'setor_nome' => $this->string(60)->notNull(),
            'setor_status' => $this->integer()->notNull()
        ]);

        $this->createTable('portal.manutencao', [
            'manutencao_id' => $this->primaryKey()->unique()->notNull(),
            'tombo_id' => $this->integer()->notNull(),
            'manutencao_data_recebimento' => $this->dateTime()->notNull(),
            'manutencao_pessoa_recebimento_inf' => $this->integer()->notNull(),
            'manutencao_beneficiario' => $this->integer()->notNull(),
            'manutencao_data_devolucao' => $this->dateTime(),
            'manutencao_func_devolucao_inf' => $this->integer(),
            'manutencao_beneficiario_devolucao' => $this->integer(),
            'manutencao_descricao' => $this->string()->notNull(),
            'manutencao_resolucao' => $this->string(),
            'manutencao_status' => $this->integer()->notNull(),
        ]);

        $this->createTable('portal.equipamento', [
            'equipamento_id' => $this->primaryKey()->unique()->notNull(),
            'equipamento_nome' => $this->string()->notNull(),
            'equipamento_quantidade_min' => $this->integer()->notNull(),
            'equipamento_status' => $this->integer()->notNull()
        ]);

        $this->createTable('portal.entrada', [
            'entrada_id' => $this->primaryKey()->unique()->notNull(),
            'entrada_quantidade' => $this->integer()->notNull(),
            'equipamento_id' => $this->integer()->notNull(),
            'setor_id' => $this->integer()->notNull(),
            'entrada_status' => $this->integer()->notNull()
        ]);

        $this->createTable('portal.saida', [
            'saida_id' => $this->primaryKey()->unique()->notNull(),
            'saida_quantidade' => $this->integer()->notNull(),
            'equipamento_id' => $this->integer()->notNull(),
            'setor_id' => $this->integer()->notNull(),
            'saida_status' => $this->integer()->notNull()
        ]);

        $this->createTable('portal.movimentacao', [
            'movimentacao_id' => $this->primaryKey()->unique()->notNull(),
            'entrada_id' => $this->integer()->notNull(),
            'saida_id' => $this->integer()->notNull(),
            'manutencao_id' => $this->integer()->notNull(),
            'manutencao_status' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('tombo_manutencao', 'portal.manutencao', 'tombo_id', 'portal.tombo', 'tombo_id');
        $this->addForeignKey('manutencao_pessoa_recebimento', 'portal.manutencao', 'manutencao_pessoa_recebimento_inf', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('manutencao_beneficiario', 'portal.manutencao', 'manutencao_beneficiario', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('manutencao_func_devolucao_inf', 'portal.manutencao', 'manutencao_func_devolucao_inf', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('manutencao_beneficiario_devolucao', 'portal.manutencao', 'manutencao_beneficiario_devolucao', 'dados_unico.pessoa', 'pessoa_id');
        $this->addForeignKey('entrada_equipamento', 'portal.entrada', 'equipamento_id', 'portal.equipamento', 'equipamento_id');
        $this->addForeignKey('entrada_setor', 'portal.entrada', 'setor_id', 'portal.setor', 'setor_id');
        $this->addForeignKey('saida_equipamento', 'portal.saida', 'equipamento_id', 'portal.equipamento', 'equipamento_id');
        $this->addForeignKey('saida_setor', 'portal.saida', 'setor_id', 'portal.setor', 'setor_id');

        $this->batchInsert('portal.setor', ['setor_id', 'setor_nome', 'setor_status'], [
            [1, 'DIRGER', 1],
            [2, 'ASSESP', 1],
            [3, 'ASSTEC', 1],
            [4, 'APE', 1],
            [5, 'PROJUR', 1],
            [6, 'ASCOM', 1],
            [7, 'DDSA', 1],
            [8, 'DDSV', 1],
            [9, 'DIPA', 1],
            [10, 'DAF', 1],
            [11, 'CCF', 1],
            [12, 'COMAP', 1],
            [13, 'COSAX', 1],
            [14, 'CACP', 1],
            [15, 'CRH', 1]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('saida_setor', 'portal.saida');
        $this->dropForeignKey('saida_equipamento', 'portal.saida');
        $this->dropForeignKey('entrada_setor', 'portal.entrada');
        $this->dropForeignKey('entrada_equipamento', 'portal.entrada');
        $this->dropForeignKey('manutencao_beneficiario_devolucao', 'portal.manutencao');
        $this->dropForeignKey('manutencao_func_devolucao_inf', 'portal.manutencao');
        $this->dropForeignKey('manutencao_beneficiario', 'portal.manutencao');
        $this->dropForeignKey('manutencao_pessoa_recebimento', 'portal.manutencao');
        $this->dropForeignKey('tombo_manutencao', 'portal.manutencao');

        $this->dropTable('portal.movimentacao');
        $this->dropTable('portal.saida');
        $this->dropTable('portal.entrada');
        $this->dropTable('portal.equipamento');
        $this->dropTable('portal.manutencao');
        $this->dropTable('portal.setor');
        $this->dropTable('portal.tombo');
    }
}
