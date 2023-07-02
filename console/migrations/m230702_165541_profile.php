<?php

use yii\db\Migration;

/**
 * Class m230702_165541_profile
 */
class m230702_165541_profile extends Migration
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

        $this->createTable('{{%profile}}', [
            'id_user' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'birthday' => $this->string()->notNull(),
            'gender' => $this->string()->notNull(),
            'enmail' => $this->string()->notNull()->unique(),
            'phone' => $this->integer()->unique(),
            'address' => $this->string()->notNull(), 
            'created_at' => $this->timestamp(),
            'created_by' => $this->string(),
            'updated_at' => $this->timestamp(),
            'updated_by' => $this->string(),

        ], $tableOptions);

        $this->addForeignKey(
            'fk-user', 

            'profile', 
            'id_user',

            'users',  
            'id_user', 
             
            'CASCADE' 
        );
    }

    public function down()
    {
        $this->dropTable('{{%profile}}');
    }
}
