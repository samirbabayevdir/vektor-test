<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_i18n}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m210223_034903_create_category_i18n_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_i18n}}', [
            'id' => $this->primaryKey(),
            'fk_ref' => $this->integer(11),
            'lang' => $this->string(255),
            'name' => $this->string(2000),
        ]);

        // creates index for column `fk_ref`
        $this->createIndex(
            '{{%idx-category_i18n-fk_ref}}',
            '{{%category_i18n}}',
            'fk_ref'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-category_i18n-fk_ref}}',
            '{{%category_i18n}}',
            'fk_ref',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-category_i18n-fk_ref}}',
            '{{%category_i18n}}'
        );

        // drops index for column `fk_ref`
        $this->dropIndex(
            '{{%idx-category_i18n-fk_ref}}',
            '{{%category_i18n}}'
        );

        $this->dropTable('{{%category_i18n}}');
    }
}
