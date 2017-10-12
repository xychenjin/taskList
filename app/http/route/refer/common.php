<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 16:22
 */

return [
    ['/phpinfo', 'www\ReferController@phpInfo', 'phpinfo'],
    ['/php', 'www\ReferController@php', 'php'],
    ['/mysql', 'www\ReferController@mysqlInfo', 'mysqlinfo'],
    ['/http', 'www\ReferController@httpdInfo', 'httpdinfo'],
    ['/host', 'www\ReferController@hostInfo', 'hostinfo'],
    ['/other', 'www\ReferController@otherInfo', 'otherinfo'],
    ['/refer/detail', 'www\ReferController@referDetail', 'referdetail'],
    ['/php/param/detail', 'www\ReferController@paramDetail', 'php.param.detail'],
    ['/php/param', 'www\ReferController@param', 'php.param'],


    ['/refer', 'www\ReferController@reference', 'refer'],
    ['/proc', 'www\ReferController@proc', 'proc'],



    ['/refer/test', 'www\ReferController@test', 'test'],
    ['/server', 'www\ReferController@server', 'server'],

    ['/about', 'www\AboutController@index', 'about.index'],
    ['/refer/jsTest', 'www\ReferController@jsTest', 'js.test'],
];