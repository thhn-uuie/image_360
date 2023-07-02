<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%categories}}`.
 */
class m230702_145420_add_created_at_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}', 'created_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}', 'created_at');
    }
}
