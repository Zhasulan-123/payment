<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paying}}`.
 */
class m200902_094151_create_paying_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%paying}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'sum' => $this->integer(3)->notNull(),
            'commision' => $this->integer(),
            'order_number' => $this->integer()->notNull(),
            'signature' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%paying}}');
    }
}
