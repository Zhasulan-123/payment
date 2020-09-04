<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%paying}}`.
 */
class m200903_084407_drop_commision_column_from_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('paying', 'commision');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('paying', 'commision', $this->integer());
    }
}
