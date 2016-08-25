<?php

use yii\db\Migration;

/**
 * Handles the creation for table `events_user`.
 * Has foreign keys to the tables:
 *
 * - `events`
 * - `user`
 */
class m160817_090800_create_junction_table_for_events_and_user_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('events_user', [
            'events_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(events_id, user_id)',
        ]);

        // creates index for column `events_id`
        $this->createIndex(
            'idx-events_user-events_id',
            'events_user',
            'events_id'
        );

        // add foreign key for table `events`
        $this->addForeignKey(
            'fk-events_user-events_id',
            'events_user',
            'events_id',
            'events',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-events_user-user_id',
            'events_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-events_user-user_id',
            'events_user',
            'user_id',
            'user',
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
            'fk-events_user-events_id',
            'events_user'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            'idx-events_user-events_id',
            'events_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-events_user-user_id',
            'events_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-events_user-user_id',
            'events_user'
        );

        $this->dropTable('events_user');
    }
}
