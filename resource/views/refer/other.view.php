<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/9/7
 * Time: 10:37
 */

$title = '其他';

$toggleJs = getRequestName() . '/js/toggle.me.js';
$animateUrl = getRequestName() . '/js/animate';

$linkStyle = <<<EOT
    <style>
        /*p a:hover{color:darkorange; background: darkred;}*/
</style>
EOT;


$linkJavascript = <<<EOT
<script type="text/javascript" src="$toggleJs" charset="UTF-8"></script>
EOT;

$context = <<<EOT
    <div>
        <h1 class="toggle ">MDN权威 - Web开发者参考 <b>&gt;</b></h1>
        <p><a class="link" target="_blank" href="https://developer.mozilla.org/en-US/docs/Web">web开发者参考  https://developer.mozilla.org/en-US/docs/Web</a></p>
    </div>    
    
    <div>
        <h1 class="toggle ">MDN - JavaScript <b>&gt;</b></h1>
        <p><a class="link" href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects" target="_blank">JS开发者 - 在线查阅 https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects</a> </p>
    </div>  
    
    <div>
        <h1 class="toggle ">MDN - HTTP Status Code <b>&gt;</b></h1>
        <p><a class="link" href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Status" target="_blank">HTTP Status Code查看 https://developer.mozilla.org/en-US/docs/Web/HTTP/Status</a> </p>
    </div>  
       
    <div>    
        <h1 class="toggle ">jQuery <b>&gt;</b></h1>
        <p class="style-bold">Jquery 官网 - 参考</p>
        <p><a class="link" href="http://api.jquery.com/" target="_blank">Jquery 官网 - 参考 http://api.jquery.com/</a> </p>
   
        <p class="style-bold">Jquery 官网-下载</p>
        <p><a class="link" href="http://jquery.com/download/" target="_blank">Jquery 官网 - 下载 http://jquery.com/download/</a> </p>
    
        <div>
            <p class="style-bold toggle ">Jquery 动画实现 <b>&gt;</b></p>
            <p><a class="link" href="/js/animate" >Jquery 动画实现 - 来，追我呀 $animateUrl</a> </p>
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

view('layouts.master', compact('title', 'context', 'linkJavascript', 'javascriptContent', 'linkStyle'));
