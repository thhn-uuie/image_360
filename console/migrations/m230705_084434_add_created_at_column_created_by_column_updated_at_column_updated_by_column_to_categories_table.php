<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%categories}}`.
 */
class m230705_084434_add_created_at_column_created_by_column_updated_at_column_updated_by_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}', 'created_at', $this->integer());
        $this->addColumn('{{%categories}}', 'created_by', $this->string());
        $this->addColumn('{{%categories}}', 'updated_at', $this->integer());
        $this->addColumn('{{%categories}}', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}', 'created_at');
        $this->dropColumn('{{%categories}}', 'created_by');
        $this->dropColumn('{{%categories}}', 'updated_at');
        $this->dropColumn('{{%categories}}', 'updated_by');
    }
}
