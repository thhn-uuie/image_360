<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%wishlist}}`.
 */
class m230823_044724_drop_status_column_from_wishlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%wishlist}}', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%wishlist}}', 'status', $this->string());
    }
}
