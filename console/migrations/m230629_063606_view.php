<?php

use yii\db\Migration;

/**
 * Class m230629_063606_view
 */
class m230629_063606_view extends Migration
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

        $this->createTable('{{%view}}', [
            'id_view' => $this->primaryKey(),
            'id_products' => $this->integer()->notNull()->unique(),
            'count' => $this->string()->notNull(),
            'date' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-view_products',
            'view', 
            'id_products', 

            'products',  
            'id_products', 
            'CASCADE' 
        );
    }

    public function down()
    {
        $this->dropTable('{{%view}}');
    }
}
