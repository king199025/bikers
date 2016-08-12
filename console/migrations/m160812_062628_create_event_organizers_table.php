<?php

use yii\db\Migration;

/**
 * Handles the creation for table `event_organizers`.
 */
class m160812_062628_create_event_organizers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event_organizers', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(11)->notNull(),
            'club_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event_organizers');
    }
}
