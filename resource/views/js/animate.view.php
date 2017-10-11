<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/12
 * Time: 16:11
 */

$title = "JS-动画特效研究";
$linkStyle = <<<EOT
    <style>
    .auto-run{color: red; }
    .auto-definer em{font-style: normal}
</style>
EOT;

$context = <<<EOT
<h1 class="auto-definer">自动执行次数：第 <b class="auto-run">0</b> 次</h1>

<p style="width: 50px;height: 50px; display: block; padding: 10px; font-size:16px;font-family:'微软雅黑 Light';line-height: 50px;position:relative;background: #e9686b;cursor: pointer;text-align: center;z-index: 999;opacity: 1;-moz-user-select: none;-khtml-user-select: none;user-select: none;" class="move">开始</p>

<pre style="background: grey;padding: 10px;font-size: 16px;opacity:0.6;font-weight:bold;font-family:Arial,microsoft YaHei;">
    核心代码：
        1.随机方向：<span><object>direction</object>[<object>Math</object>.<method>round</method>(<object>Math</object>.<method>rand</method>())]</span> 
        2.偏移计算：
            【屏幕可见区域的高度y】 <span>$(<object>window</object>).<method>height</method>()</span>
            【屏幕可见区域的宽度x】 <span>$(<object>window</object>).<method>width</method>()</span>
            【计算相对body的偏移量y】 <span>$(<object>selector</object>)[0].<property>offsetTop</property>【int】</span> 或 <span>$(<object>selector</object>).<method>offset</method>().<property>top</property>【float】</span> 
            【计算相对body的偏移量x】 <span>$(<object>selector</object>)[0].<property>offsetLeft</property>【int】</span> 或 <span>$(<object>selector</object>).<method>offset</method>().<property>left</property>【float】</span>
        3.设置偏移
            【初始位置】<span>$(<object>selector</object>).<method>offset</method>({<property>top</property>:0,<property>left</property>:0})</span> 或 <span>$(<object>selector</object>).<method>css</method>({<property>top</property>:0,<property>left</property>:0})</span>
        4.动画效果    
             <span>$(<object>selector</object>).<method>animation</method>(<params>properties</params>:{<property>top</property>:0,<property>left</property>:0}, <params>duration</params>: 1500/ms, <params>easing</params>:"<property>liner</property>|<property>swing</property>", <params>complete</params>: <method>function</method>(){})</span>
        5.jQuery绑定自定义函数
            <span><define>$.fn.selfFunc</define> = <method>function</method>(){}</span> 或 <span><define>Jquery.fn.extend</define>({<params>selfFunc</params>:<method>function</method>(){})</span> 或 <span><define>Jquery.fn.selfFunc</define> = <method>function</method>(){}</span>
</pre>
EOT;

$toggleMeJs = getRequestName() . "/js/animate.me.js";

$linkJavascript = <<<EOT
<script type="text/javascript" src="$toggleMeJs" charset="UTF-8"></script>
EOT;


$javascriptContent = <<<EOT
<script type="text/javascript">
    $(document).ready(function() {
        var moveElement = $(".move");
            moveElement.initAnimation();
    });

</script>
EOT;

view('layouts.master', compact('title', 'context', 'javascriptContent', 'linkJavascript', 'linkStyle'));