<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m230705_084443_add_created_at_column_created_by_column_updated_at_column_updated_by_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%products}}', 'created_at', $this->integer());
        $this->addColumn('{{%products}}', 'created_by', $this->string());
        $this->addColumn('{{%products}}', 'updated_at', $this->integer());
        $this->addColumn('{{%products}}', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%products}}', 'created_at');
        $this->dropColumn('{{%products}}', 'created_by');
        $this->dropColumn('{{%products}}', 'updated_at');
        $this->dropColumn('{{%products}}', 'updated_by');
    }
}
