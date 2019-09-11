<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leads}}`.
 */
class m190910_163020_create_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Leads}}', [
            'id' => $this->primaryKey()->notNull(),
            'form_name' => $this->string(255)->notNull(),
            'name' => $this->string(255)->null(),
            'phone' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Leads}}');
    }
}
