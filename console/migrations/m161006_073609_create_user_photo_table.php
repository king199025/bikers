<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_photo`.
 */
class m161006_073609_create_user_photo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_photo', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(11)->notNull(),
            'img' => $this->string(255)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_photo');
    }
}
