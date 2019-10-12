<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manufacturers}}`.
 */
class m190925_094430_create_manufacturers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturers}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->null(),
            'img' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manufacturers}}');
    }
}
