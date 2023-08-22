<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%products}}`.
 */
class m230821_082527_drop_description_column_from_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%products}}', 'description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%products}}', 'description', $this->string()->notNull());
    }
}
