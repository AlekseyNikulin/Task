<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class DbInitController
 * @package app\commands
 */
class DbInitController extends Controller
{

    /**
     * @return int
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        $dsn = \Yii::$app->db->schema->db->dsn;

        parse_str(substr($dsn, strpos($dsn, 'dbname')), $dbname);

        \Yii::$app->db->schema->db->dsn = substr($dsn,0, strpos($dsn, 'dbname'));

        \Yii::$app->db->createCommand('CREATE SCHEMA IF NOT EXISTS '. $dbname['dbname'] .' DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci')->execute();

        return ExitCode::OK;
    }
}
