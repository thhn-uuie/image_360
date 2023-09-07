<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%profile}}`.
 */
class m230907_170612_drop_phone_column_from_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%profile}}', 'phone');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%profile}}', 'phone', $this->integer());
    }
}
