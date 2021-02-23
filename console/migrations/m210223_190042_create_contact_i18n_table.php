<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_i18n}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%contact}}`
 */
class m210223_190042_create_contact_i18n_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_i18n}}', [
            'id' => $this->primaryKey(),
            'fk_ref' => $this->integer(11),
            'lang' => $this->string(255),
            'address' => $this->string(2000),
            'info' => $this->text(),
        ]);

        // creates index for column `fk_ref`
        $this->createIndex(
            '{{%idx-contact_i18n-fk_ref}}',
            '{{%contact_i18n}}',
            'fk_ref'
        );

        // add foreign key for table `{{%contact}}`
        $this->addForeignKey(
            '{{%fk-contact_i18n-fk_ref}}',
            '{{%contact_i18n}}',
            'fk_ref',
            '{{%contact}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%contact}}`
        $this->dropForeignKey(
            '{{%fk-contact_i18n-fk_ref}}',
            '{{%contact_i18n}}'
        );

        // drops index for column `fk_ref`
        $this->dropIndex(
            '{{%idx-contact_i18n-fk_ref}}',
            '{{%contact_i18n}}'
        );

        $this->dropTable('{{%contact_i18n}}');
    }
}
