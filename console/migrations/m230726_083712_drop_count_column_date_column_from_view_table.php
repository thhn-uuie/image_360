<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%view}}`.
 */
class m230726_083712_drop_count_column_date_column_from_view_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%view}}', 'count');
        $this->dropColumn('{{%view}}', 'date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%view}}', 'count', $this->string());
        $this->addColumn('{{%view}}', 'date', $this->string());
    }
}
