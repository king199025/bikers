<?php

use yii\db\Migration;

/**
 * Handles the creation for table `events`.
 */
class m160811_111828_create_events_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'city' => $this->integer(11),
            'city_near' => $this->integer(11),
            'lon' => $this->float(),
            'lat' => $this->float(),
            'dt_start' => $this->integer(11)->notNull(),
            'dt_end' => $this->integer(11),
            'site_url' => $this->string(64),
            'vk_url' => $this->string(64),
            'ok_url' => $this->string(64),
            'fb_url' => $this->string(64),
            'other_link1' => $this->string(64),
            'other_link2' => $this->string(64),
            'other_link3' => $this->string(64),
            'afisha' => $this->string(512),
            'type' => $this->integer(1),
            'organizer' => $this->integer(11),
            'tags' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('events');
    }
}
