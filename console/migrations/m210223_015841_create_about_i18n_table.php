<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%about_i18n}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%about}}`
 */
class m210223_015841_create_about_i18n_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%about_i18n}}', [
            'id' => $this->primaryKey(),
            'fk_ref' => $this->integer(11),
            'lang' => $this->string(255),
            'description_one' => $this->text(),
            'description_two' => $this->text(),
        ]);

        // creates index for column `fk_ref`
        $this->createIndex(
            '{{%idx-about_i18n-fk_ref}}',
            '{{%about_i18n}}',
            'fk_ref'
        );

        // add foreign key for table `{{%about}}`
        $this->addForeignKey(
            '{{%fk-about_i18n-fk_ref}}',
            '{{%about_i18n}}',
            'fk_ref',
            '{{%about}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%about}}`
        $this->dropForeignKey(
            '{{%fk-about_i18n-fk_ref}}',
            '{{%about_i18n}}'
        );

        // drops index for column `fk_ref`
        $this->dropIndex(
            '{{%idx-about_i18n-fk_ref}}',
            '{{%about_i18n}}'
        );

        $this->dropTable('{{%about_i18n}}');
    }
}
