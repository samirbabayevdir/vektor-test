<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m210213_004143_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'image' => $this->string(2000),
            'image_banner' => $this->string(2000),
            'status' => $this->tinyInteger(2)->notNull(),
            'keywords' => 'LONGTEXT',
            'description' => 'LONGTEXT',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
