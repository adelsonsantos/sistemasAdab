<?php

use yii\db\Migration;

/**
 * Class m180220_124133_insere_permissao_diarias
 */
class m180220_124133_insere_permissao_diarias extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute('INSERT INTO PUBLIC.AUTH_ASSIGNMENT (ITEM_NAME, USER_ID, SISTEMA_ID)
                              (
                            SELECT CASE UT.TIPO_USUARIO_ID 
                            WHEN 11
                            THEN "administrador"
                            WHEN 6
                            THEN "aprovador"
                            WHEN 5
                            THEN "autorizador"
                            WHEN 4
                            THEN "comprovador"
                            WHEN 34
                            THEN "consulta-diarias"
                            WHEN 9
                            THEN "empenha-executa"
                            WHEN 35
                            THEN "gestor-orcamento"
                            WHEN 33
                            THEN "gestor-despesas"
                            WHEN 7
                            THEN "gestor-diarias"
                            WHEN 18
                            THEN "gestor-financeiro"
                            WHEN 31
                            THEN "pre-autorizador"
                            WHEN 8
                            THEN "pre-liquidante"
                            WHEN 36
                            THEN "recursos-humanos"
                            WHEN 30
                            THEN "solicitante"
                            WHEN 22
                            THEN "gestor-orcamentario"
                            ELSE ""
                            END AS PERFIL,
                            UT.PESSOA_ID,
                            1
                            FROM SEGURANCA.USUARIO_TIPO_USUARIO UT 
                            JOIN SEGURANCA.TIPO_USUARIO T ON UT.TIPO_USUARIO_ID = T.TIPO_USUARIO_ID 
                            WHERE SISTEMA_ID = 2)'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180220_124133_insere_permissao_diarias cannot be reverted.\n";

        return false;
    }
}
