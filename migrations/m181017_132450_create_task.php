<?php

use yii\db\Migration;

/**
 * Class m181017_132450_create_task
 */
class m181017_132450_create_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("task", [
            "id" => $this->bigPrimaryKey(),
            "create_at" => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            "title" => $this->string(255),
            "date" => $this->timestamp(),
            "author" => $this->string(255),
            "status" => $this->string(255),
            "description" => $this->text(),
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("task");
        echo "m181017_132450_create_task success be reverted.\n";
        return true;
    }
}
