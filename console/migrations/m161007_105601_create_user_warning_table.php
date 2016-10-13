<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_warning`.
 */
class m161007_105601_create_user_warning_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_warning', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'new_events' => $this->integer(2)->defaultValue(0),
            'bookmark_events' => $this->integer(2)->defaultValue(0),
            'new_clubs' => $this->integer(2)->defaultValue(0),
            'new_post' => $this->integer(2)->defaultValue(0),
            'new_news' => $this->integer(2)->defaultValue(0),
            'new_travel' => $this->integer(2)->defaultValue(0),
            'bookmark_travel' => $this->integer(2)->defaultValue(0),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_warning');
    }
}
