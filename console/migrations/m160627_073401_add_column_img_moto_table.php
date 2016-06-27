<?php

use yii\db\Migration;

class m160627_073401_add_column_img_moto_table extends Migration
{
    public function up()
    {
        $this->addColumn('img_moto', 'user_id', \yii\db\Schema::TYPE_INTEGER . '(11) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('img_moto', 'user_id');
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
