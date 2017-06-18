<?php

use yii\db\Migration;

class m170618_151922_create_hospital_table extends Migration
{
    public function up()
    {
        $this->createTable('hospital_pacient_form_widget', [
            'id' => $this->primaryKey(),
            'name' => $this->string(55)->notNull(),
            'family' => $this->string(55)->notNull(),
            'email' => $this->string(55)->null(),
            'phone' => $this->string(55)->null(),
            'date' => $this->string(22)->null(),
            'time' => $this->string(22)->null(),
            'status' => $this->integer(2)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('hospital_pacient_form_widget');
    } 
}
