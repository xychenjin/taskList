<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 10:37
 */

$title = '其他';

$toggleJs = getRequestName() . '/js/toggle.me.js';

$linkJavascript = <<<EOT
<script type="text/javascript" src="$toggleJs" charset="UTF-8"></script>
EOT;

$context = <<<EOT
    <div>
        <h1 class="toggle ">jQuery <b>&gt;</b></h1>
        <p class="style-bold">Jquery 官网 - 参考</p>
        <p><a href="http://api.jquery.com/" target="_blank">Jquery 官网 - 参考</a> </p>
            
        <p class="style-bold">Jquery 官网-下载</p>
        <p><a href="http://jquery.com/download/" target="_blank">Jquery 官网 - 下载</a> </p>
    
        <div>
            <p class="style-bold toggle ">Jquery 动画实现 <b>&gt;</b></p>
            <p><a href="/js/animate" >Jquery 动画实现 - 来，追我呀</a> </p>
        </div>

    </div>

EOT;

$javascriptContent = <<<EOT
<script type="text/javascript">
    $(document).ready(function() {
        var toggleElement = $(".toggle");
            toggleElement.css({cursor:"pointer"}).each(function(i, obj) {
               $(obj).toggleMe();
            });    
    })

</script>
EOT;

view('layouts.master', compact('title', 'context', 'linkJavascript', 'javascriptContent'));
