<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_post`.
 */
class m161010_102612_create_user_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'slug' => $this->string(255),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user_post');
    }
}
