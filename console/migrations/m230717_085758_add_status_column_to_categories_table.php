<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%categories}}`.
 */
class m230717_085758_add_status_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}', 'status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}', 'status');
    }
}
