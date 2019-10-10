<?php

use yii\db\Migration;

/**
 * Class m191004_103840_items_img
 */
class m191004_103840_items_img extends Migration
{

    public static function tableName(){
        return '{{%items_img}}';
    }

    public function safeUp()
    {
        $this->createTable(self::tableName(), [
            'id' => $this->primaryKey()->notNull(),
            'img' => $this->string(255)->notNull(),
            'id_color' => $this->integer(11)->notNull(),
            'id_item' => $this->integer(11)->notNull(),
        ]);
        $this->createIndex(
            'idx-items_img-id_color',
            'items_img',
            'id_color'
        );
        $this->addForeignKey(
            'fk-items_img-id_color',
            'items_img',
            'id_color',
            'colors',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-items_img-id_item',
            'items_img',
            'id_item'
        );
        $this->addForeignKey(
            'fk-items_img-id_item',
            'items_img',
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
            'fk-items_img-id_color',
            'items_img'
        );
        $this->dropIndex(
            'idx-items_img-id_color',
            'items_img'
        );
        $this->dropForeignKey(
            'fk-items_img-id_item',
            'items_img'
        );
        $this->dropIndex(
            'idx-items_img-id_item',
            'items_img'
        );
        $this->dropTable('{{%items}}');
    }
}
