<?php

use yii\db\Migration;

/**
 * Handles adding type to table `clubs`.
 */
class m160812_102301_add_type_column_to_clubs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('clubs', 'type', $this->integer(11));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('clubs', 'type');
    }
}
