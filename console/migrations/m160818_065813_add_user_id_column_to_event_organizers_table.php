<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `event_organizers`.
 */
class m160818_065813_add_user_id_column_to_event_organizers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('event_organizers', 'user_id', $this->integer(11));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('event_organizers', 'user_id');
    }
}
