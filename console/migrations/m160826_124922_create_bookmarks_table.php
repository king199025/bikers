<?php

use yii\db\Migration;

/**
 * Handles the creation for table `bookmarks`.
 */
class m160826_124922_create_bookmarks_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bookmarks', [
            'id' => $this->primaryKey(),
            'user' => $this->integer(),
            'event' => $this->integer()
        ]);
        $this->createIndex(
            'idx-bookmarks-user',
            'bookmarks',
            'user'
        );

        // add foreign key for table `events`
        $this->addForeignKey(
            'fk-bookmarks-user',
            'bookmarks',
            'user',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-bookmarks-event',
            'bookmarks',
            'event'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-bookmarks-event',
            'bookmarks',
            'event',
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
            'fk-bookmarks-event',
            'bookmarks'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            'idx-bookmarks-event',
            'bookmarks'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-bookmarks-user',
            'bookmarks'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-bookmarks-user',
            'bookmarks'
        );

        $this->dropTable('bookmarks');
    }
}
