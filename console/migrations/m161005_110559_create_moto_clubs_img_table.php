<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moto_clubs_img`.
 */
class m161005_110559_create_moto_clubs_img_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('moto_clubs_img', [
            'id' => $this->primaryKey(),
            'img' => $this->string(255)->notNull(),
            'moto_club_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('moto_clubs_img');
    }
}
