<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%categories}}`.
 */
class m230731_022452_drop_description_column_from_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%categories}}', 'description');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%categories}}', 'description', $this->string());
    }
}
