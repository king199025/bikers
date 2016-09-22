<?php

use yii\db\Migration;
use yii\db\Schema;

class m160909_113937_add_column_profile extends Migration
{
    public function up()
    {
        $this->addColumn('{{%profile}}', 'avatar', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%profile}}', 'avatar');
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
