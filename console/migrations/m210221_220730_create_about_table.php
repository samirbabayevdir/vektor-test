<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about}}`.
 */
class m210221_220730_create_about_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about}}', [
            'id' => $this->primaryKey(),
            'description_one' => $this->text(),
            'description_two' => $this->text(),
            'image' => $this->string(2000),
            'image_banner' => $this->string(200),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%about}}');
    }
}
