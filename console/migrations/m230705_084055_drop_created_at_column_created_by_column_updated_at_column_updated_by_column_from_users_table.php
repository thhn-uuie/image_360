<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%users}}`.
 */
class m230705_084055_drop_created_at_column_created_by_column_updated_at_column_updated_by_column_from_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%users}}', 'created_at');
        $this->dropColumn('{{%users}}', 'created_by');
        $this->dropColumn('{{%users}}', 'updated_at');
        $this->dropColumn('{{%users}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%users}}', 'created_at', $this->timestamp());
        $this->addColumn('{{%users}}', 'created_by', $this->string());
        $this->addColumn('{{%users}}', 'updated_at', $this->timestamp());
        $this->addColumn('{{%users}}', 'updated_by', $this->string());
    }
}
