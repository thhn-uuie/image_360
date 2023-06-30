<?php

use yii\db\Migration;

/**
 * Class m230629_063635_role
 */
class m230629_063635_role extends Migration
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

        $this->createTable('{{%role}}', [
            'id_role' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
        ], $tableOptions);
    
        $this->addForeignKey(
            'fk-user_role', 

            'users',  
            'id_role',   
            
            'role', 
            'id_role',

            'CASCADE' 
        );
    }

    public function down()
    {
        $this->dropTable('{{%role}}');
    }
}
