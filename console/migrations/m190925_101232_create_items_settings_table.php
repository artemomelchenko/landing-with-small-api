<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items_settings}}`.
 */
class m190925_101232_create_items_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items_settings}}', [
            'id' => $this->primaryKey()->notNull(),
            'price' => $this->string(255)->null(),
            'garanty' => $this->string(255)->null(),
            'zinс' => $this->string(255)->null(),
            'premium' => $this->boolean()->notNull(),
            'premium_text' => $this->string(255)->null(),
            'id_manufacturer' => $this->integer(11)->notNull(),
            'id_item' => $this->integer(11)->notNull(),
        ]);
        $this->createIndex(
            'idx-items_settings-id_manufacturer',
            'items_settings',
            'id_manufacturer'
        );
        $this->createIndex(
            'idx-items_settings-id_item',
            'items_settings',
            'id_item'
        );
        $this->addForeignKey(
            'fk-items_settings-id_item',
            'items_settings',
            'id_item',
            'items',
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
            'fk-comment-id_item',
            'items_settings'
        );
        $this->dropIndex(
            'idx-comment-id_manufacturer',
            'items_settings'
        );
        $this->dropIndex(
            'idx-comment-id_item',
            'items_settings'
        );
        $this->dropTable('{{%items_settings}}');
    }
}
