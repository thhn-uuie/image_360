<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%categories}}`.
 */
class m230702_145442_add_created_by_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}', 'created_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}', 'created_by');
    }
}
