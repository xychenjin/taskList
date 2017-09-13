<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/6
 * Time: 15:30
 */

$context = <<<EOT
    <h1>简易框架开发步骤</h1>
    <p>1.服务器配置：单一文件入口</p>
    <p>2.请求路由及参数解析</p>
    <p>3.模板查找及变量赋值</p>
    <p>4.资源及数据缓存机制</p>
    <p>5.对话访问和用户认证机制</p>
EOT;

view('layouts.master', compact('context'));