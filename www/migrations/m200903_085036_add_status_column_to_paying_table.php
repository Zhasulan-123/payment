<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%paying}}`.
 */
class m200903_085036_add_status_column_to_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('paying', 'status', $this->integer(1)->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('paying', 'status');
    }
}
