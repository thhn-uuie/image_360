<?php

use yii\db\Migration;

/**
 * Class m230813_162335_wishlist
 */
class m230813_162335_wishlist extends Migration
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

        $this->createTable('{{%wishlist}}', [
            'id_wis' => $this->primaryKey()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'id_products' => $this->integer()->notNull(),
            'created_at' => $this->string(),
            'status' => $this->string(),
        ], $tableOptions);


        $this->createIndex(
            'idx-products_wis-id_user',
            'wishlist',
            'id_user'
        );


        $this->addForeignKey(
            'fk-products_wishlist',
            'wishlist',
            'id_products',

            'products',
            'id_products',


            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_wishlist',
            'wishlist',
            'id_user',

            'users',
            'id_user',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%wishlist}}');
    }
}
