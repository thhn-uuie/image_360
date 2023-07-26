<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%products}}`.
 */
class m230726_084320_drop_number_of_views_column_from_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%products}}', 'number_of_views');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%products}}', 'number_of_views', $this->string());
    }
}
