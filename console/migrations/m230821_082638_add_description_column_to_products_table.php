<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m230821_082638_add_description_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'description');
    }
}
