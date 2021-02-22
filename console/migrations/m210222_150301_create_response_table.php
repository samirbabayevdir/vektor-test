<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%response}}`.
 */
class m210222_150301_create_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%response}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'email' => $this->string(255),
            'phone' => $this->string(255),
            'message' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%response}}');
    }
}
