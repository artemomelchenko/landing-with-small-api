<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m190925_094556_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->notNull(),
            'length' => $this->string(255)->null(),
            'height' => $this->string(255)->null(),
            'full_weight' => $this->string(255)->null(),
            'weight' => $this->string(255)->null(),
            'id_categories' => $this->integer(11)->notNull(),
        ]);
        $this->createIndex(
            'idx-items-id_category',
            'items',
            'id_categories'
        );
        $this->addForeignKey(
            'fk-items-id_category',
            'items',
            'id_categories',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-items-id_category',
            'items'
        );
        $this->dropIndex(
            'idx-items-id_category',
            'items'
        );
        $this->dropTable('{{%items}}');
    }
}
