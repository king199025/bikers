<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moto_clubs`.
 */
class m161004_073459_create_moto_clubs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('moto_clubs', [
            'id' => $this->primaryKey(),
            'name_rus' => $this->string(255)->notNull(),
            'name_en' => $this->string(255)->notNull(),
            'type' => $this->integer(11)->defaultValue(1),
            'filial' => $this->integer(2)->notNull(),
            'address' => $this->string(255)->defaultValue(NULL),
            'logo' => $this->string(255)->notNull(),
            'dt_start' => $this->integer(11)->defaultValue(NULL),
            'site' => $this->string(255)->defaultValue(NULL),
            'group_vk' => $this->string(255)->defaultValue(NULL),
            'group_fb' => $this->string(255)->defaultValue(NULL),
            'group_ok' => $this->string(255)->defaultValue(NULL),
            'email' => $this->string(255)->defaultValue(NULL),
            'phone' => $this->string(255)->defaultValue(NULL),
            'skype' => $this->string(255)->defaultValue(NULL),
            'description' => $this->text(),
            'slug' => $this->string(255),
            'status' => $this->integer(2)->defaultValue(0),
            'user_id' => $this->integer(11)->notNull(),
            'city_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('moto_clubs');
    }
}
