<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%paying}}`.
 */
class m200903_085511_add_updated_ad_column_to_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('paying', 'updated_ad', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('paying', 'updated_ad');
    }
}
