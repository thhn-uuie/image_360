<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%categories}}`.
 */
class m230705_084356_drop_created_at_column_created_by_column_updated_at_column_updated_by_column_from_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%categories}}', 'created_at');
        $this->dropColumn('{{%categories}}', 'created_by');
        $this->dropColumn('{{%categories}}', 'updated_at');
        $this->dropColumn('{{%categories}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%categories}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%categories}}', 'created_by', $this->string());
        $this->addColumn('{{%categories}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%categories}}', 'updated_by', $this->string());
    }
}
