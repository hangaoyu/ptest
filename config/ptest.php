<?php
/**
 * Created by PhpStorm.
 * User: hangaoyu
 * Date: 17/9/26
 * Time: 上午10:43
 */
return [

    'name'      => 'packages-test',
    'route'=>[
        'prefix'=>'ptest',
        'middleware'=>['package'],
    ]
];