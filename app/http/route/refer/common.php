<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 16:22
 */

return [
    ['/phpinfo', 'www\ReferController@phpInfo', 'phpinfo'],
    ['/mysql', 'www\ReferController@mysqlInfo', 'mysqlinfo'],
    ['/http', 'www\ReferController@httpdInfo', 'httpdinfo'],
    ['/host', 'www\ReferController@hostInfo', 'hostinfo'],
    ['/refer', 'www\ReferController@reference', 'refer'],
    ['/proc', 'www\ReferController@proc', 'proc'],



    ['/refer/test', 'www\ReferController@test', 'test'],
    ['/look', 'www\ReferController@look', 'look'],

];