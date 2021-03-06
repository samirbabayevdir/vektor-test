<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meta_pages}}`.
 */
class m210306_115025_create_meta_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meta_pages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'title' => $this->string(256),
            'description' => $this->text(),
            'keywords' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%meta_pages}}');
    }
}
