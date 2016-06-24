<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `table_img_moto`.
 */
class m160624_072805_create_table_img_moto extends Migration
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

        $this->createTable('img_moto', [
            'id' => Schema::TYPE_PK,
            'garage_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'img' => Schema::TYPE_STRING . '(255) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('img_garage_fk', 'img_moto', 'garage_id', 'garage', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('img_garage_fk', 'img_moto');

        $this->dropTable('img_moto');
    }
}
