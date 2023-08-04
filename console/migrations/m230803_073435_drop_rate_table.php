<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%rate}}`.
 */
class m230803_073435_drop_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%rate}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%rate}}', [
            'id_rate' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'comment' => $this->string(),
            'rate' => $this->string()->notNull(),
            'time' => $this->string(),
        ]);
    }
}
