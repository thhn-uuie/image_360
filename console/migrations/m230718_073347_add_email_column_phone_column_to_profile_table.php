<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%profile}}`.
 */
class m230718_073347_add_email_column_phone_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'email', $this->string());
        $this->addColumn('{{%profile}}', 'phone', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'email');
        $this->dropColumn('{{%profile}}', 'phone');
    }
}
