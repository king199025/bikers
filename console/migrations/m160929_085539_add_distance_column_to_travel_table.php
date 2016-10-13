<?php

use yii\db\Migration;

/**
 * Handles adding distance to table `travel`.
 */
class m160929_085539_add_distance_column_to_travel_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('travel', 'icon', \yii\db\Schema::TYPE_STRING . '(255) NOT NULL');
        $this->addColumn('travel', 'distance', \yii\db\Schema::TYPE_INTEGER . '(11) NOT NULL');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('travel', 'icon');
        $this->dropColumn('travel', 'distance');

    }
}
