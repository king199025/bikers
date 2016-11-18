<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moto_clubs_personal`.
 */
class m161024_081712_create_moto_clubs_personal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropTable('moto_clubs_personal');

        $this->createTable('moto_clubs_personal', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'club_id' => $this->integer(11)->notNull(),
            'position' => $this->string(255)->notNull(),
            'link_vk' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('moto_clubs_personal');
    }
}
