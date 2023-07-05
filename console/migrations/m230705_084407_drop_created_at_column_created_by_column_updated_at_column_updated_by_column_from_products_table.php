<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%products}}`.
 */
class m230705_084407_drop_created_at_column_created_by_column_updated_at_column_updated_by_column_from_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%products}}', 'created_at');
        $this->dropColumn('{{%products}}', 'created_by');
        $this->dropColumn('{{%products}}', 'updated_at');
        $this->dropColumn('{{%products}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%products}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%products}}', 'created_by', $this->string());
        $this->addColumn('{{%products}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%products}}', 'updated_by', $this->string());
    }
}
