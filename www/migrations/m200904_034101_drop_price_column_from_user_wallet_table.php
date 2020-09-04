<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%user_wallet}}`.
 */
class m200904_034101_drop_price_column_from_user_wallet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('user_wallet', 'price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('user_wallet', 'price', $this->integer()->notNull());
    }
}
