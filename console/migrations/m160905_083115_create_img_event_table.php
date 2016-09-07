<?php

use yii\db\Migration;

/**
 * Handles the creation for table `img_event`.
 */
class m160905_083115_create_img_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('img_event', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255),
            'event_id' => $this->integer(11)
        ]);
        $this->createIndex(
            'idx-img_event-event',
            'img_event',
            'event_id'
        );

        // add foreign key for table `events`
        $this->addForeignKey(
            'fk-img_event-event',
            'img_event',
            'event_id',
            'events',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-img_event-event',
            'img_event'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            'idx-img_event-event',
            'img_event'
        );
        $this->dropTable('img_event');
    }
}
