<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 11:12
 */

$title = 'MySQL版本';

$context = <<<EOT
    <h1>MySQL数据库版本</h1>
    <p>1.本地版本：10.1.21-MariaDB</p>
    <p>2.远程版本[14]：5.6.25</p>
    <p>3.远程版本[13]：5.6.25</p>

    <p>MySQL参考文档：<a href="https://dev.mysql.com/doc/refman/5.6/en/" target="_blank">https://dev.mysql.com/doc/refman/5.6/en/</a></p>
    <p>MySQL下载：<a href="https://www.mysql.com/downloads/" target="_blank">https://www.mysql.com/downloads/</a></p>
EOT;

view('layouts.master', compact('context', 'title'));
