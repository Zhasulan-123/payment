<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%paying}}`.
 */
class m200904_022236_drop_updated_ad_column_from_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('paying', 'updated_ad');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('paying', 'updated_ad', $this->datetime());
    }
}
