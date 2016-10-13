<?php

use yii\db\Migration;

/**
 * Handles the creation for table `album_photo_user`.
 */
class m161006_071144_create_album_photo_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('album_photo_user', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('album_photo_user');
    }
}
