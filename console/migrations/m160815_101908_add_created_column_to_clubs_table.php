<?php

use yii\db\Migration;

/**
 * Handles adding created to table `clubs`.
 */
class m160815_101908_add_created_column_to_clubs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('clubs', 'created', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('clubs', 'created');
    }
}
