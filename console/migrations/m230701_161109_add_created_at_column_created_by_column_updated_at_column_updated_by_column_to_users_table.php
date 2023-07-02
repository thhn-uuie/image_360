<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m230701_161109_add_created_at_column_created_by_column_updated_at_column_updated_by_column_to_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%users}}', 'created_by', $this->string());
        $this->addColumn('{{%users}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%users}}', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'created_at');
        $this->dropColumn('{{%users}}', 'created_by');
        $this->dropColumn('{{%users}}', 'updated_at');
        $this->dropColumn('{{%users}}', 'updated_by');
    }
}
