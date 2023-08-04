<?php

use yii\db\Migration;

/**
 * Class m230803_071717_rate
 */
class m230803_071717_rate extends Migration
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

        $this->createTable('{{%rate}}', [
            'id_rate' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'comment' => $this->string(),
            'rate' => $this->string()->notNull(),
            'time' => $this->string(),
        ], $tableOptions);


        $this->createIndex(
            'idx-products_rate-id_user',
            'rate',
            'id_user'
        );


        $this->addForeignKey(
            'fk-products_rate',
            'rate',
            'id_products',

            'products',
            'id_products',


            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_rate',
            'rate',
            'id_user',

            'users',
            'id_user',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%rate}}');
    }
}