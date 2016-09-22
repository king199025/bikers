<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `events`.
 */
class m160909_090232_add_user_id_column_to_events_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('events', 'user_id', $this->integer(11)->notNull());
        $this->addColumn('events', 'status', $this->integer(2)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('events', 'user_id');
        $this->dropColumn('events', 'status');
    }
}
