<?php

use yii\db\Migration;

/**
 * Handles the creation for table `events_tags`.
 * Has foreign keys to the tables:
 *
 * - `events`
 * - `tags`
 */
class m160816_105555_create_junction_table_for_events_and_tags_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('events_tags', [
            'events_id' => $this->integer(),
            'tags_id' => $this->integer(),
            'PRIMARY KEY(events_id, tags_id)',
        ]);

        // creates index for column `events_id`
        $this->createIndex(
            'idx-events_tags-events_id',
            'events_tags',
            'events_id'
        );

        // add foreign key for table `events`
        $this->addForeignKey(
            'fk-events_tags-events_id',
            'events_tags',
            'events_id',
            'events',
            'id',
            'CASCADE'
        );

        // creates index for column `tags_id`
        $this->createIndex(
            'idx-events_tags-tags_id',
            'events_tags',
            'tags_id'
        );

        // add foreign key for table `tags`
        $this->addForeignKey(
            'fk-events_tags-tags_id',
            'events_tags',
            'tags_id',
            'tags',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `events`
        $this->dropForeignKey(
            'fk-events_tags-events_id',
            'events_tags'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            'idx-events_tags-events_id',
            'events_tags'
        );

        // drops foreign key for table `tags`
        $this->dropForeignKey(
            'fk-events_tags-tags_id',
            'events_tags'
        );

        // drops index for column `tags_id`
        $this->dropIndex(
            'idx-events_tags-tags_id',
            'events_tags'
        );

        $this->dropTable('events_tags');
    }
}
