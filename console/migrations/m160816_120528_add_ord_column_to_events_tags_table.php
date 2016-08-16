<?php

use yii\db\Migration;

/**
 * Handles adding ord to table `events_tags`.
 */
class m160816_120528_add_ord_column_to_events_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('events_tags', 'ord', $this->string(32));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('events_tags', 'ord');
    }
}
