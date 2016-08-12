<?php

use yii\db\Migration;

/**
 * Handles the creation for table `club_types`.
 */
class m160812_094121_create_club_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('club_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('club_types');
    }
}
