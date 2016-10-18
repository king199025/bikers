<?php

use yii\db\Migration;

/**
 * Handles the creation for table `events_tags_new`.
 */
class m161013_121310_create_events_tags_new_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('events_tags_new', [
            'id' => $this->primaryKey(),
            'events_id' => $this->integer(11)->notNull(),
            'tags' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('events_tags_new');
    }
}
