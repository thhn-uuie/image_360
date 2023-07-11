<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%profile}}`.
 */
class m230710_081640_drop_created_at_column_created_by_column_updated_at_column_updated_by_column_from_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%profile}}', 'created_at');
        $this->dropColumn('{{%profile}}', 'created_by');
        $this->dropColumn('{{%profile}}', 'updated_at');
        $this->dropColumn('{{%profile}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%profile}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%profile}}', 'created_by', $this->string());
        $this->addColumn('{{%profile}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%profile}}', 'updated_by', $this->string());
    }
}
