<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%paying}}`.
 */
class m200903_181552_drop_status_column_from_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('paying', 'status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('paying', 'status', $this->integer(1)->notNull()->defaultValue(0));
    }
}
