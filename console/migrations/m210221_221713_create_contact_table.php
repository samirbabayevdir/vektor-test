<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m210221_221713_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(256),
            'number' => $this->string(256),
            'address' => $this->string(2000),
            'info' => $this->string(2000),
            'whatsapp' => $this->string(2000),
            'facebook' => $this->string(2000),
            'instagram' => $this->string(2000),
            'linkedin' => $this->string(2000),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
