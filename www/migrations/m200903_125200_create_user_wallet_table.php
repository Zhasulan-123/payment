<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_wallet}}`.
 */
class m200903_125200_create_user_wallet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_wallet}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'sum' => $this->integer()->notNull(),
            'commision' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'created_at' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_wallet}}');
    }
}
