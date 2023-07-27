<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%view}}`.
 */
class m230726_083833_add_view_count_column_view_date_column_to_view_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%view}}', 'view_count', $this->integer());
        $this->addColumn('{{%view}}', 'view_date', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%view}}', 'view_count');
        $this->dropColumn('{{%view}}', 'view_date');
    }
}
