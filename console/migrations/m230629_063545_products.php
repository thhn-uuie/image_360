<?php

use yii\db\Migration;

/**
 * Class m230629_063545_products
 */
class m230629_063545_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id_products' => $this->primaryKey(),
            'name_products' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'id_category' => $this->integer(),
            'image' => $this->string()->notNull(),
            'files' => $this->string()->notNull(),
            'qr_code' => $this->string()->notNull()->unique(),          
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%products}}');
    }
}
