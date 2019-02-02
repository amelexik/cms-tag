<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190122_125520_table__tag
 */
class m190122_125520_table__tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id'        => Schema::TYPE_PK,
            'name'      => Schema::TYPE_STRING . ' NOT NULL',
            'frequency' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }

}
