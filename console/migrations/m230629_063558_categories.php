<?php

use yii\db\Migration;

/**
 * Class m230629_063558_categories
 */
class m230629_063558_categories extends Migration
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

        $this->createTable('{{%categories}}', [
            'id_category' => $this->primaryKey(),
            'name_category' => $this->string()->notNull()->unique(),
            'description' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-category_products', 
            
            'products', 
            'id_category', 

            'categories',  
            'id_category', 
            
            'CASCADE' 
        );
    }

    public function down()
    {
        $this->dropTable('{{%categories}}');
    }
}