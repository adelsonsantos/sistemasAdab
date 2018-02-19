<?php

use yii\db\Migration;

/**
 * Class m180118_120417_portal_gerencia
 */
class m180118_120417_portal_gerencia extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('portal.gerencia', [
            'ger_id' => $this->primaryKey()->unique()->notNull(),
            'ger_nome' => $this->string(60)->notNull(),
            'id_coordenadoria' => $this->integer()
        ]);

        $this->addForeignKey('gerenciaComCoordenadoria', 'portal.gerencia', 'id_coordenadoria', 'diaria.coordenadoria', 'id_coordenadoria');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropForeignKey('gerenciaComCoordenadoria', 'portal.gerencia');

        $this->dropTable('portal.gerencia');
    }
}