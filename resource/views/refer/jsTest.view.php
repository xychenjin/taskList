<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/10/12
 * Time: 10:26
 */

$context = <<<EOT
    <h1>JS activeObject：</h1>
    <ul>
        <li><a href="https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Headers" target="_blank">HTTP Headers</a> </li>
    
</ul>

<label >请填写文件：</label>
<input type="file" name="file" />

<button type="button" onclick="ShowFileInfo()">按钮</button>
  <script type="text/javascript">
    function ShowFileInfo() {
        var url = "https://www.baidu.com";
        
        console.info(encodeURIComponent(url));
        console.info(decodeURIComponent(encodeURIComponent(url)));
    }
    
    
    function abc(a, b, c) {
      console.info("abc.arguments.length : " + abc.arguments.length);
    }
</script>  
EOT;

view('layouts.master', [
    'context' => $context
]);