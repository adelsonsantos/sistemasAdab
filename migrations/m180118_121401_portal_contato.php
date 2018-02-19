<?php

use yii\db\Migration;

/**
 * Class m180118_121401_portal_contato
 */
class m180118_121401_portal_contato extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('portal.contato_tipo', [
            'cti_id' => $this->primaryKey()->unique()->notNull(),
            'cti_nome' => $this->string(60)->notNull()
        ]);

        $this->createTable('portal.contato', [
            'con_id' => $this->primaryKey()->unique()->notNull(),
            'con_nome' => $this->string(60)->notNull(),
            'con_ddd' => $this->string(2)->notNull(),
            'con_telefone' => $this->string(12)->notNull(),
            'cti_id' => $this->integer()
        ]);

        $this->addForeignKey('contato_tipo', 'portal.contato', 'cti_id', 'portal.contato_tipo', 'cti_id');

        $this->createTable('portal.coordenadoria_gerencia', [
            'cog_id' => $this->primaryKey()->unique()->notNull(),
            'id_coordenadoria' => $this->integer()->notNull(),
            'ger_id' => $this->integer(),
            'esc_id' => $this->integer(),
            'con_id' => $this->integer()
        ]);

        $this->addForeignKey('id_coordenadoria', 'portal.coordenadoria_gerencia', 'id_coordenadoria', 'diaria.coordenadoria', 'id_coordenadoria');
        $this->addForeignKey('ger_id', 'portal.coordenadoria_gerencia', 'ger_id', 'portal.gerencia', 'ger_id');
        $this->addForeignKey('contato', 'portal.coordenadoria_gerencia', 'con_id', 'portal.contato', 'con_id');


        $this->createTable('portal.escritorio', [
            'esc_id' => $this->primaryKey()->unique()->notNull(),
            'esc_nome' => $this->string(60)->notNull(),
            'id_coordenadoria' => $this->integer()->notNull(),
            'ger_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('escritorio_contato', 'portal.coordenadoria_gerencia', 'esc_id', 'portal.escritorio', 'esc_id');
        $this->addForeignKey('coordenadoria_escritorio', 'portal.escritorio', 'id_coordenadoria', 'diaria.coordenadoria', 'id_coordenadoria');
        $this->addForeignKey('gerencia_escritorio', 'portal.escritorio', 'ger_id', 'portal.gerencia', 'ger_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('gerencia_escritorio', 'portal.escritorio');

        $this->dropForeignKey('coordenadoria_escritorio', 'portal.escritorio');

        $this->dropForeignKey('escritorio_contato', 'portal.coordenadoria_gerencia');

        $this->dropTable('portal.escritorio');

        $this->dropForeignKey('contato', 'portal.coordenadoria_gerencia');

        $this->dropForeignKey('ger_id', 'portal.coordenadoria_gerencia');

        $this->dropForeignKey('id_coordenadoria', 'portal.coordenadoria_gerencia');

        $this->dropTable('portal.coordenadoria_gerencia');

        $this->dropForeignKey('contato_tipo', 'portal.contato');

        $this->dropTable('portal.contato');

        $this->dropTable('portal.contato_tipo');
    }
}
