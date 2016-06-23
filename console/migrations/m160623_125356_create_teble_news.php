<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `teble_news`.
 */
class m160623_125356_create_teble_news extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'img' => Schema::TYPE_STRING . '(255) NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'dt_update' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'short_text' => Schema::TYPE_STRING . '(255) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . '(255) NOT NULL',

        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
