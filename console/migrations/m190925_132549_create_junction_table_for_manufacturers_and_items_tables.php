<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manufacturers_items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%manufacturers}}`
 * - `{{%items}}`
 */
class m190925_132549_create_junction_table_for_manufacturers_and_items_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manufacturers_items}}', [
            'manufacturers_id' => $this->integer(),
            'items_id' => $this->integer(),
            'PRIMARY KEY(manufacturers_id, items_id)',
        ]);

        // creates index for column `manufacturers_id`
        $this->createIndex(
            '{{%idx-manufacturers_items-manufacturers_id}}',
            '{{%manufacturers_items}}',
            'manufacturers_id'
        );

        // add foreign key for table `{{%manufacturers}}`
        $this->addForeignKey(
            '{{%fk-manufacturers_items-manufacturers_id}}',
            '{{%manufacturers_items}}',
            'manufacturers_id',
            '{{%manufacturers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `items_id`
        $this->createIndex(
            '{{%idx-manufacturers_items-items_id}}',
            '{{%manufacturers_items}}',
            'items_id'
        );

        // add foreign key for table `{{%items}}`
        $this->addForeignKey(
            '{{%fk-manufacturers_items-items_id}}',
            '{{%manufacturers_items}}',
            'items_id',
            '{{%items}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%manufacturers}}`
        $this->dropForeignKey(
            '{{%fk-manufacturers_items-manufacturers_id}}',
            '{{%manufacturers_items}}'
        );

        // drops index for column `manufacturers_id`
        $this->dropIndex(
            '{{%idx-manufacturers_items-manufacturers_id}}',
            '{{%manufacturers_items}}'
        );

        // drops foreign key for table `{{%items}}`
        $this->dropForeignKey(
            '{{%fk-manufacturers_items-items_id}}',
            '{{%manufacturers_items}}'
        );

        // drops index for column `items_id`
        $this->dropIndex(
            '{{%idx-manufacturers_items-items_id}}',
            '{{%manufacturers_items}}'
        );

        $this->dropTable('{{%manufacturers_items}}');
    }
}
