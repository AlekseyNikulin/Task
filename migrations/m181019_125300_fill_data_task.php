<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m181019_125300_fill_data_task
 */
class m181019_125300_fill_data_task extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $data = [];
        for($i = 0;$i<=1002;$i++){
            $data[] = [
                "Задание",
                new Expression("NOW()"),
                'Автор',
                rand(0,1),
                'Описание'
            ];
        }
        $this->db->createCommand()
            ->batchInsert("task",['title', 'date', 'author', 'status', 'description'],$data)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable("task");
        echo "m181019_125300_fill_data_task success be reverted.\n";
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181019_125300_fill_data_task cannot be reverted.\n";

        return false;
    }
    */
}
