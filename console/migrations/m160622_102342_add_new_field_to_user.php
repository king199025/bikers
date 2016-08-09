<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles adding new_field to table `user`.
 */
class m160622_102342_add_new_field_to_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'road_nickname', Schema::TYPE_STRING);
        $this->addColumn('{{%user}}', 'birthday', Schema::TYPE_INTEGER);
        $this->addColumn('{{%user}}', 'floor', Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'road_nickname');
        $this->dropColumn('{{%user}}', 'birthday');
        $this->dropColumn('{{%user}}', 'floor');
    }
}
