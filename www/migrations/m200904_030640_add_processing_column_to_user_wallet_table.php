<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user_wallet}}`.
 */
class m200904_030640_add_processing_column_to_user_wallet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_wallet', 'processing', $this->string(1)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user_wallet', 'processing');
    }
}
