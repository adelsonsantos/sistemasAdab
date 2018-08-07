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
        $this->alterColumn('termo.vigilancia_fiscalizacao_acao', 'vigilancia_fiscalizacao_acao_nome', $this->string(255));

        $this->batchInsert('termo.vigilancia_fiscalizacao_local',
            ['vigilancia_fiscalizacao_local_id', 'vigilancia_fiscalizacao_local_nome', 'vigilancia_fiscalizacao_local_st'],
            [
                [1, 'Propriedade rural', 1],
                [2, 'Assentamento', 1],
                [3, 'Terra indigena', 1],
                [4, 'Fundo do pasto', 1],
                [5, 'Rodovia/Estrada vivinal', 1],
                [6, 'Posto fiscalização', 1],
                [7, 'Estabel. de aglomeração', 1],
                [8, 'Revenda/Distr.', 1],
                [9, 'Agroindústria', 1],
                [10, 'Salgadeira', 1],
                [11, 'Lixão/Aterro', 1],
                [12, 'Laboratório/Sala exame', 1],
                [13, 'Estab. de comércio aves vivas', 1],
                [14, 'Abrigo de morcegos', 1],
                [15, 'Escritório/Gerência/Coreg da ADAB', 1]
            ]
        );

        $this->batchInsert('termo.vigilancia_fiscalizacao_status',
            ['vigilancia_fiscalizacao_status_id', 'vigilancia_fiscalizacao_status_nome', 'vigilancia_fiscalizacao_status_st'],
            [
                [1, 'Normal', 1],
                [2, 'Risco', 1],
                [3, 'Inadimplente', 1],
                [4, 'Interditada', 1],
                [5, 'Certificada', 1]
            ]);

        $this->batchInsert('termo.vigilancia_fiscalizacao_atividade',
            ['vigilancia_fiscalizacao_atividade_id', 'vigilancia_fiscalizacao_atividade_nome', 'vigilancia_fiscalizacao_atividade_st'],
            [
                [1, 'Cadastramento/Recadastramento', 1],
                [2, 'Vigilância Ativa', 1],
                [3, 'Fiscalização', 1],
                [4, 'Supervisão/Auditoria', 1],
                [5, 'Atendimento ao produtor', 1]
            ]);

        $this->batchInsert('termo.vigilancia_fiscalizacao_acao',
            ['vigilancia_fiscalizacao_acao_nome', 'vigilancia_fiscalizacao_acao_st', 'vigilancia_fiscalizacao_acao_cmp_complentar'],
            [
                ['Abertura/Validação decadastro', 1, 2],
                ['Atualização cadastral', 1, 2],
                ['Georreferenciamento', 1, 2],
                ['Contagem de rebanho', 1, 2],
                ['Embarque acompanhado', 1, 2],
                ['Lacre veículo N°', 1, 1],
                ['Fiscalização trânsito agropecuário', 1, 2],
                ['Análise de risco / Investigação', 1, 2],
                ['Exame clínico', 1, 2],
                ['Colheita de amostras', 1, 2],
                ['Desinfecção', 1, 2],
                ['Controle de vetores', 1, 2],
                ['Interdição / Desinterdição', 1, 2],
                ['Apreenção', 1, 1],
                ['Sacrifício ou abate sanitário', 1, 2],
                ['Destruição', 1, 2],
                ['Vacinação oficial', 1, 2],
                ['Vacinação assistida', 1, 2],
                ['Vacinação fiscalizada', 1, 2],
                ['Notificação', 1, 2],
                ['Autuação N°', 1, 1],
                ['Inventário de vacinas', 1, 2],
                ['Recebimento vacinas', 1, 1],
                ['Verifi. armazenamento vacinas e produtos', 1, 2],
                ['Supervisão / Auditoria', 1, 2],
                ['Emissão de GTA, documentos sanitários e recebimento de declaração e notificações', 1, 2]
            ]);

        $this->batchInsert('termo.vigilancia_fiscalizacao_animal',
            ['vigilancia_fiscalizacao_animal_id', 'vigilancia_fiscalizacao_animal_nome', 'vigilancia_fiscalizacao_animal_st'],
            [
                [1, 'Bovino', 1],
                [2, 'Bubalino', 1],
                [3, 'Caprino', 1],
                [4, 'Ovino', 1],
                [5, 'Equino', 1],
                [6, 'Asinino', 1],
                [7, 'Muar', 1],
                [8, 'Suíno', 1],
                [9, 'Aves', 1],
                [10, 'Abelhas (Colmeía)', 1],
                [11, 'Peixes', 1],
                [12, 'Crustáceos', 1]
            ]);

        $this->batchInsert('termo.vigilancia_fiscalizacao_faixa_etaria',
            ['vigilancia_fiscalizacao_animal_faixa_etaria_id', 'vigilancia_fiscalizacao_animal_faixa_etaria_periodo', 'vigilancia_fiscalizacao_animal_id'],
            [
                [1, '0 a 12 m', 1],
                [2, '13 a 24 m', 1],
                [3, '25 a 36 m', 1],
                [4, '+ de 36 m', 1],
                [5, '0 a 12 m', 2],
                [6, '13 a 24 m', 2],
                [7, '25 a 36 m', 2],
                [8, '+ de 36 m', 2],
                [9, '0 a 6 m', 3],
                [10, '+ de 6 m', 3],
                [11, '0 a 6 m', 4],
                [12, '+ de 6 m', 4],
                [13, '0 a 6 m', 5],
                [14, '+ de 6 m', 5],
                [15, '0 a 6 m', 6],
                [16, '+ de 6 m', 6],
                [17, '0 a 6 m', 7],
                [18, '+ de 6 m', 7]
            ]);

        $this->batchInsert('termo.vigilancia_fiscalizacao_animal_campos',
            [
                'vigilancia_fiscalizacao_animal_campos_id',
                'vigilancia_fiscalizacao_animal_id',
                'vigilancia_fiscalizacao_animal_campos_machos_nascidos',
                'vigilancia_fiscalizacao_animal_campos_machos_mortos',
                'vigilancia_fiscalizacao_animal_campos_machos_existentes',
                'vigilancia_fiscalizacao_animal_campos_machos_vacinados',
                'vigilancia_fiscalizacao_animal_campos_femeas_nascidas',
                'vigilancia_fiscalizacao_animal_campos_femeas_mortas',
                'vigilancia_fiscalizacao_animal_campos_femeas_existentes',
                'vigilancia_fiscalizacao_animal_campos_femeas_vacinadas',
                'vigilancia_fiscalizacao_animal_campos_quantidade',
                'vigilancia_fiscalizacao_animal_campos_st'
            ],
            [
                [1, 1, true, true, true, true, true, true, true, true, false, 1],
                [2, 2, true, true, true, true, true, true, true, true, false, 1],
                [3, 3, true, true, true, true, true, true, true, true, false, 1],
                [4, 4, true, true, true, true, true, true, true, true, false, 1],
                [5, 5, true, true, true, false, true, true, true, false, false, 1],
                [6, 6, true, true, true, false, true, true, true, false, false, 1],
                [7, 7, true, true, true, false, true, true, true, false, false, 1],
                [8, 8, true, true, true, false, true, true, true, false, false, 1],
                [9, 9, false, false, false, false, false, false, false, false, true, 1],
                [10, 10, false, false, false, false, false, false, false, false, true, 1],
                [11, 11, false, false, false, false, false, false, false, false, true, 1],
                [12, 12, false, false, false, false, false, false, false, false, true, 1]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->delete('termo.vigilancia_fiscalizacao_animal_campos', ['vigilancia_fiscalizacao_animal_campos_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]]);
       $this->delete('termo.vigilancia_fiscalizacao_animal_faixa_etaria', ['vigilancia_fiscalizacao_animal__faixa_etaria_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]]);
       $this->delete('termo.vigilancia_fiscalizacao_animal', ['vigilancia_fiscalizacao_animal_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]]);
       $this->delete('termo.vigilancia_fiscalizacao_acao', ['vigilancia_fiscalizacao_acao_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26]]);
       $this->delete('termo.vigilancia_fiscalizacao_atividade', ['vigilancia_fiscalizacao_atividade_id' => [1, 2, 3, 4, 5]]);
       $this->delete('termo.vigilancia_fiscalizacao_status', ['vigilancia_fiscalizacao_atividade_id' => [1, 2, 3, 4, 5]]);
       $this->delete('termo.vigilancia_fiscalizacao_local', ['vigilancia_fiscalizacao_local_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]]);
    }
}
