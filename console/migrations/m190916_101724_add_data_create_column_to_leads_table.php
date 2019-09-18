<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%leads}}`.
 */
class m190916_101724_add_data_create_column_to_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('leads', 'date_create', $this->timestamp()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('leads', 'date_create');
    }
}
