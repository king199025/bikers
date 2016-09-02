<?php

use yii\db\Migration;

/**
 * Handles adding program to table `events`.
 */
class m160902_125823_add_program_column_to_events_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('events','program',$this->string(5000));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('events','program');
    }
}
