<?php

use yii\db\Migration;

/**
 * Handles adding promo to table `clubs`.
 */
class m160812_120323_add_promo_column_to_clubs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('clubs', 'promo', $this->string(32));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('clubs', 'promo');
    }
}
