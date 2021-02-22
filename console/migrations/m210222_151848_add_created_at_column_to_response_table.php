<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%response}}`.
 */
class m210222_151848_add_created_at_column_to_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%response}}', 'created_at', $this->integer(11)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%response}}', 'created_at');
    }
}
