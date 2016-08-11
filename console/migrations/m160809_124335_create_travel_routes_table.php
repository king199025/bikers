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
            'id' => Schema::TYPE_PK,
            'travel_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'city_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ]);
        $this->addForeignKey('travel_routes_travel_id_fk', 'travel_routes', 'travel_id', 'travel', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('travel_routes_from_city_id_fk', 'travel_routes', 'city_id', 'City', 'Id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('travel_routes_travel_id_fk', 'travel_routes');
        $this->dropForeignKey('travel_routes_city_id_fk', 'travel_routes');
        
        $this->dropTable('travel_routes');
    }
}
