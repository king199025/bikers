<?php

use yii\db\Migration;

/**
 * Handles the creation for table `club_members`.
 */
class m160812_082141_create_club_members_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('club_members', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'club_id' => $this->integer(11)->notNull(),
            'position' => $this->string(32),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('club_members');
    }
}
