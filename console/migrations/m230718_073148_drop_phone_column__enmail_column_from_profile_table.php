<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%profile}}`.
 */
class m230718_073148_drop_phone_column__enmail_column_from_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%profile}}', 'phone');
        $this->dropColumn('{{%profile}}', 'enmail');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%profile}}', 'phone', $this->integer());
        $this->addColumn('{{%profile}}', 'enmail', $this->string());
    }
}
