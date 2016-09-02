<?php

use yii\db\Migration;

/**
 * Handles the creation for table `travel_bookmark`.
 */
class m160831_135530_create_travel_bookmark_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('travel_bookmark', [
            'id' => $this->primaryKey(),
            'user' => $this->integer(),
            'travel' => $this->integer()
        ]);

        $this->createIndex(
            'idx-travel-bookmark-user',
            'travel_bookmark',
            'user'
        );

        // add foreign key for table `events`
        $this->addForeignKey(
            'fk-travel-bookmark-user',
            'travel_bookmark',
            'user',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-travel_bookmark-travel',
            'travel_bookmark',
            'travel'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-travel_bookmark-travel',
            'travel_bookmark',
            'travel',
            'travel',
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
            'fk-travel_bookmark-travel',
            'travel_bookmark'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            'idx-travel_bookmark-travel',
            'travel_bookmark'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-travel_bookmark-user',
            'travel_bookmark'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-travel_bookmark-user',
            'travel_bookmark'
        );

        $this->dropTable('travel_bookmark');
    }
}
