<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_i18n}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m210223_190230_create_product_i18n_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_i18n}}', [
            'id' => $this->primaryKey(),
            'fk_ref' => $this->integer(11),
            'lang' => $this->string(255),
            'description' => $this->text(),
        ]);

        // creates index for column `fk_ref`
        $this->createIndex(
            '{{%idx-product_i18n-fk_ref}}',
            '{{%product_i18n}}',
            'fk_ref'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_i18n-fk_ref}}',
            '{{%product_i18n}}',
            'fk_ref',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_i18n-fk_ref}}',
            '{{%product_i18n}}'
        );

        // drops index for column `fk_ref`
        $this->dropIndex(
            '{{%idx-product_i18n-fk_ref}}',
            '{{%product_i18n}}'
        );

        $this->dropTable('{{%product_i18n}}');
    }
}
