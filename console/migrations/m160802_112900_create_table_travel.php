<?php

use yii\db\Migration;
use yii\db\Schema;

class m160802_112900_create_table_travel extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('travel', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'city_start' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'city_end' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'dt_start' => Schema::TYPE_STRING . '(20) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' DEFAULT NULL',
            'slug' => Schema::TYPE_STRING . '(255) NOT NULL',
            'dt_add' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'dt_update' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'moto_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'status' => Schema::TYPE_INTEGER . '(11) NOT NULL'
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('travel');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
