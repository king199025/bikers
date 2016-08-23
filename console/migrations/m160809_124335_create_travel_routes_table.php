<?php

use yii\db\Migration;

/**
 * Handles the creation for table `travel_routes`.
 */
class m160809_124335_create_travel_routes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('travel_routes', [
            'id' => $this->primaryKey(),
            'travel_id' => $this->integer(11)->notNull(),
            'city_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('travel_routes');
    }
}
