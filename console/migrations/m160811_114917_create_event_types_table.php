<?php

use yii\db\Migration;

/**
 * Handles the creation for table `event_types`.
 */
class m160811_114917_create_event_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event_types');
    }
}
