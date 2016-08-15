<?php

use yii\db\Migration;

/**
 * Handles the creation for table `event_tags`.
 */
class m160812_083417_create_event_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event_tags', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer(11)->notNull(),
            'name' => $this->string(32)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event_tags');
    }
}
