<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `table_garage`.
 */
class m160624_072116_create_table_garage extends Migration
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

        $this->createTable('garage', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'mark_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'model_id' => Schema::TYPE_INTEGER . '(1) NOT NULL',
            'year' => Schema::TYPE_INTEGER . '(4) NOT NULL',
            'volume' => Schema::TYPE_INTEGER . '(10) NOT NULL',
            'used' => Schema::TYPE_INTEGER . '(2) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('garage_user_id_fk', 'garage', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('garage_user_id_fk', 'garage');

        $this->dropTable('garage');
    }
}
