<?php

use yii\db\Migration;

class m200619_113340_create_table_company extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'create_at' => $this->timestamp(),
            'name' => $this->string(),
            'address' => $this->string(),
            'zip' => $this->string(),
            'active' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%company}}');
    }
}
