<?php

use yii\db\Migration;

/**
 * Handles the creation for table `clubs`.
 */
class m160812_081308_create_clubs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('clubs', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'city' => $this->integer(11)->notNull(),
            'phone' => $this->integer(12),
            'email' => $this->string(32),
            'skype' => $this->string(32),
            'site_url' => $this->string(32),
            'vk_url' => $this->string(32),
            'fb_url' => $this->string(32),
            'ok_url' => $this->string(32),
            'photos' => $this->integer(11),
            'lon' => $this->float(),
            'lat' => $this->float(),
            'about' => $this->string(1024),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('clubs');
    }
}
