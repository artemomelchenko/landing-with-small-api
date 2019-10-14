<?php

use yii\db\Migration;

/**
 * Class m191014_064600_items
 */
class m191014_064600_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('items', 'garanty', $this->string(255)->null());
        $this->addColumn('items', 'price', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('items', 'garanty');
        $this->dropColumn('items', 'price');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191014_064600_items cannot be reverted.\n";

        return false;
    }
    */
}
