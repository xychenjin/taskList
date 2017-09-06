<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 11:12
 */
$context = <<<EOT
    <h1>MySQL数据库版本</h1>
    <p>1.本地版本：10.1.21-MariaDB</p>
    <p>2.远程版本[14]：5.6.25</p>
    <p>3.远程版本[13]：5.6.25</p>
EOT;

view('layouts.master', compact('context'));
