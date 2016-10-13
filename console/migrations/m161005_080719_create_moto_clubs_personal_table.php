<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moto_clubs_personal`.
 */
class m161005_080719_create_moto_clubs_personal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('moto_clubs_personal', [
            'id' => $this->primaryKey(),
            'photo' => $this->string(255),
            'position' => $this->string(255)->notNull(),
            'link' => $this->string(255),
            'phone' => $this->string(255),
            'miti_club_id' => $this->integer(11)->notNull(),
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
