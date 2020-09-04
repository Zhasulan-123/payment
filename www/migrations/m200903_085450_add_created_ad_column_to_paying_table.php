<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%paying}}`.
 */
class m200903_085450_add_created_ad_column_to_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('paying', 'created_ad', $this->datetime()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('paying', 'created_ad');
    }
}
