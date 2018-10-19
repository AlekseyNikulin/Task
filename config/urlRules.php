<?php

return [
    /*[
        'class'  => 'yii\rest\UrlRule',
        'controller'  => 'app\modules\api\controllers\Rest',
        'prefix' => 'api',
    ],*/
    '<module>/<controller>' => '<module>/<controller>',
    '<module>/<controller>/<action>' => '<module>/<controller>/<action>',
    '<module>/<controller>/<action>/<id>' => '<module>/<controller>/<action>',
    /*'<a>/<b>' => '<a>/<b>',
    '<a>/<b>/<id>' => '<a>/<b>',
    '<a>/<b>/<c>/<d>'=>'<a>/<b>',
    '<a>/<b>/<c>/<d>/<e>'=>'<a>/<b>',*/
];