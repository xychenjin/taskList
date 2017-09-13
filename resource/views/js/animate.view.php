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
    pre b{color: darkblue; font-weight: inherit;  font-size: 17px;}
</style>
EOT;

$context = <<<EOT
<h1>自动执行时间：<b class="auto-run">0</b>次</h1>

<p onselectstart="return false;" style="width: 50px;height: 50px; display: block; padding: 10px; font-size:16px;font-family:'微软雅黑 Light';line-height: 50px;position:relative;background: #e9686b;cursor: pointer;text-align: center;z-index: 999;opacity: 1" class="move">开始</p>

<pre style="background: grey;padding: 10px;font-size: 16px;opacity:0.6;font-weight:bold;font-family:Arial,microsoft YaHei;">
    核心代码：
        1.随机方向：<b>direction[Math.round(Math.rand())]</b> 
        2.偏移计算：
            【屏幕可见区域的高度y】 <b>$(window).height()</b>
            【屏幕可见区域的宽度x】 <b>$(window).width()</b>
            【计算相对body的偏移量y】 <b>$(selector)[0].offsetTop</b> 
            【计算相对body的偏移量x】 <b>$(selector)[0].offsetLeft</b>
        3.设置偏移
            【初始位置】<b>$(selector).offset({top:0,left:0})或$(selector).css({top:0,left:0})</b>
        4.动画效果    
             <b>$(selector).animation(properties:{top:0,left:0}, duration: 1500/ms, easing:"liner|swing", complete: function(){})</b>
        5.jQuery绑定自定义函数
            <b>$.fn.selfFunc = function(){}</b> 或 <b>Jquery.fn.extend({selfFunc:function(){})</b> 或 <b>Jquery.fn.selfFunc = function(){}</b>
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