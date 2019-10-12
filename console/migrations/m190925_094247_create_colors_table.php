<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%colors}}`.
 */
class m190925_094247_create_colors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%colors}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->null(),
            'hex' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%colors}}');
    }
}
