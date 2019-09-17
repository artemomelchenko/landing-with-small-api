<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leads_settings}}`.
 */
class m190910_163213_create_leads_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Leads_settings}}', [
            'id' => $this->primaryKey()->notNull(),
            'leads_id' => $this->integer(11)->notNull(),
            'manufacturer'=> $this->string(255)->null(),
            'thickness' =>$this->string(255)->null(),
            'square' => $this->string(255)->null(),
            'comment' => $this->string(255)->null(),
        ]);
        $this->createIndex(
            'idx-leads_settings-leads_id',
            'Leads_settings',
            'leads_id'
        );

        $this->addForeignKey(
            'fk-leads_settings-leads_id',
            'Leads_settings',
            'leads_id',
            'Leads',
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
            'fk-leads_settings-leads_id',
            'Leads_settings'
        );
        $this->dropIndex(
            'idx-leads_settings-leads_id',
            'Leads_settings'
        );
        $this->dropTable('{{%Leads_settings}}');
    }
}
