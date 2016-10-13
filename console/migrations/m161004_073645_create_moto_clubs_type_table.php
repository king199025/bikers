<?php

use yii\db\Migration;

/**
 * Handles the creation for table `moto_clubs_type`.
 */
class m161004_073645_create_moto_clubs_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('moto_clubs_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->insert('moto_clubs_type',
            [
                'id' => 1,
                'name' => 'без аббревиатуры'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 2,
                'name' => 'MC'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 3,
                'name' => 'MCC'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 4,
                'name' => 'МК'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 5,
                'name' => 'RC'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 6,
                'name' => 'МFC'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 7,
                'name' => 'MG'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 8,
                'name' => 'FMC (WMC)'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 9,
                'name' => 'LE MC'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 10,
                'name' => 'Owners Club'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 11,
                'name' => 'Brotherhood (мотобратство)'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 12,
                'name' => 'Объединение'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 13,
                'name' => 'Ассоциация'
            ]);
        $this->insert('moto_clubs_type',
            [
                'id' => 14,
                'name' => 'Интернет мотосообщество'
            ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('moto_clubs_type');
    }
}
