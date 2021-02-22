<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_img}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m210216_190343_create_product_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_img}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'image' => $this->string(2000),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_img-product_id}}',
            '{{%product_img}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_img-product_id}}',
            '{{%product_img}}',
            'product_id',
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
            '{{%fk-product_img-product_id}}',
            '{{%product_img}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_img-product_id}}',
            '{{%product_img}}'
        );

        $this->dropTable('{{%product_img}}');
    }
}
