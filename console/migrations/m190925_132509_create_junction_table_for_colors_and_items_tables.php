<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%colors_items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%colors}}`
 * - `{{%items}}`
 */
class m190925_132509_create_junction_table_for_colors_and_items_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%colors_items}}', [
            'colors_id' => $this->integer(),
            'items_id' => $this->integer(),
            'PRIMARY KEY(colors_id, items_id)',
        ]);

        // creates index for column `colors_id`
        $this->createIndex(
            '{{%idx-colors_items-colors_id}}',
            '{{%colors_items}}',
            'colors_id'
        );

        // add foreign key for table `{{%colors}}`
        $this->addForeignKey(
            '{{%fk-colors_items-colors_id}}',
            '{{%colors_items}}',
            'colors_id',
            '{{%colors}}',
            'id',
            'CASCADE'
        );

        // creates index for column `items_id`
        $this->createIndex(
            '{{%idx-colors_items-items_id}}',
            '{{%colors_items}}',
            'items_id'
        );

        // add foreign key for table `{{%items}}`
        $this->addForeignKey(
            '{{%fk-colors_items-items_id}}',
            '{{%colors_items}}',
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
        // drops foreign key for table `{{%colors}}`
        $this->dropForeignKey(
            '{{%fk-colors_items-colors_id}}',
            '{{%colors_items}}'
        );

        // drops index for column `colors_id`
        $this->dropIndex(
            '{{%idx-colors_items-colors_id}}',
            '{{%colors_items}}'
        );

        // drops foreign key for table `{{%items}}`
        $this->dropForeignKey(
            '{{%fk-colors_items-items_id}}',
            '{{%colors_items}}'
        );

        // drops index for column `items_id`
        $this->dropIndex(
            '{{%idx-colors_items-items_id}}',
            '{{%colors_items}}'
        );

        $this->dropTable('{{%colors_items}}');
    }
}
