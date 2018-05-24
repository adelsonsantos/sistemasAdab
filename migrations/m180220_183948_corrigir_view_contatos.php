<?php

use yii\db\Migration;

/**
 * Class m180220_183948_corrigir_view_contatos
 */
class m180220_183948_corrigir_view_contatos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->execute('DROP VIEW portal.contato_cordenadoria_gerencia_view;');
        $this->execute('CREATE VIEW portal.contato_cordenadoria_gerencia_view AS
                                SELECT CG.COG_ID, C.ID_COORDENADORIA, C.NOME, G.GER_ID, G.GER_NOME, PC.CON_ID, PC.CON_NOME, PC.CON_DDD, PC.CON_TELEFONE,  CT.CTI_ID, CT.CTI_NOME, E.ESC_ID, E.ESC_NOME 
                                FROM PORTAL.COORDENADORIA_GERENCIA CG
                                LEFT JOIN DIARIA.COORDENADORIA C ON C.ID_COORDENADORIA = CG.ID_COORDENADORIA
                                LEFT JOIN PORTAL.GERENCIA G ON G.GER_ID = CG.GER_ID
                                LEFT JOIN PORTAL.ESCRITORIO E ON E.ESC_ID = CG.ESC_ID
                                LEFT JOIN PORTAL.CONTATO PC ON PC.CON_ID = CG.CON_ID
                                LEFT JOIN PORTAL.CONTATO_TIPO CT ON CT.CTI_ID = PC.CTI_ID;'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('DROP VIEW portal.contato_cordenadoria_gerencia_view;');
    }
}
