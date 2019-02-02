<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190122_130003_table__tag_links
 */
class m190122_130003_table__tag_links extends console\components\Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag_links}}', [
            'element_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tag_id'     => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->addPrimaryKey('', '{{%tag_links}}', ['element_id', 'tag_id']);
        $this->addForeignKey(
            'FK_TAG_LINKS_TAG', "{{%tag_links}}",
            'tag_id', '{{%tag}}', 'id', 'CASCADE', 'CASCADE'
        );
        $this->addForeignKey(
            'FK_TAG_LINKS_CONTENT_ELEMENT', "{{%tag_links}}",
            'element_id', '{{%cms_content_element}}', 'id', 'CASCADE', 'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tag_links}}');
    }
}
