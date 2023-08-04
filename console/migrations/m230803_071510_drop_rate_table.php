<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%rate}}`.
 */
class m230803_071510_drop_rate_table extends Migration
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
            'id_products' => $this->integer()->notNull()->unique(),
            'id_user' => $this->integer()->notNull(),
            'comment' => $this->string()->notNull(),
            'rate' => $this->string()->notNull(),
            'time' => $this->string()->notNull(),
        ]);
    }
}
