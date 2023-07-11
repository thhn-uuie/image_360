<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profile}}`.
 */
class m230710_081713_add_created_at_column_created_by_column_updated_at_column_updated_by_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'created_at', $this->integer());
        $this->addColumn('{{%profile}}', 'created_by', $this->string());
        $this->addColumn('{{%profile}}', 'updated_at', $this->integer());
        $this->addColumn('{{%profile}}', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'created_at');
        $this->dropColumn('{{%profile}}', 'created_by');
        $this->dropColumn('{{%profile}}', 'updated_at');
        $this->dropColumn('{{%profile}}', 'updated_by');
    }
}
