<?php
$title = '简易框架开发-首页';
$foreachBody = '';

$linkStyle = <<<EOT
<style>
    b{color: darkred;background:sandybrown}
</style>
EOT;

foreach ($hosts as $item) :
    $foreachBody .= <<<EOT
<div class="usual-group">
EOT;
    foreach (array_slice($item, 0, 4) as $originUrl => $host):
        $url = strpos($originUrl, 'http') === false ? 'http://' . $originUrl : $originUrl;
        $foreachBody .= <<<EOT
    <span>
                    <a href="$url" class="link style-bold" target="_blank">$host</a>
                    <a href="$url" class="link" target="_blank">$originUrl</a>
                </span>
EOT;


    endforeach;
    $foreachBody .= <<<EOT
<a>更多</a>
</div>
EOT;
endforeach;

$resUrls = '';

foreach ($searchUrls as $key => $item):
    $url = strpos($key, 'http') === false ? 'http://' . $key : $key;
    $item = str_replace($keywords, "<b>" . $keywords . "</b>", $item);
    $key = str_replace($keywords, "<b>" . $keywords . "</b>", $key);
    $resUrls .= <<<EOT
    <div>
    <span>
                    <a href="$url" class="link style-bold" target="_blank">$item</a>
                    <a href="$url" class="link" target="_blank">$key</a>
                </span></div>
EOT;
endforeach;

$resNames = '';

foreach ($searchNames as $key => $item):
    $url = strpos($key, 'http') === false ? 'http://' . $key : $key;
    $item = str_replace($keywords, "<b>" . $keywords . "</b>", $item);
    $key = str_replace($keywords, "<b>" . $keywords . "</b>", $key);
    $resNames .= <<<EOT
    <div>
    <span>
                    <a href="$url" class="link style-bold" target="_blank">$item</a>
                    <a href="$url" class="link" target="_blank">$key</a>
                </span></div>
EOT;
endforeach;

$clearText = '';
if ($keywords):
    $clearText = <<< EOT
<span id="clearText" style="top: 0px; left: -150px; width: 40px; height: 40px; position: relative; cursor: pointer;font-size: 25px; line-height: 40px;" onclick="removeEle()">&times;</span>
EOT;

endif;

$context = <<<EOT
    <div class="usual-body"><p>本机常用地址：</p></div>

    <div class="usual-body">
        $foreachBody 
    </div>

    <div class="usual-body">
        <form>
        <div id = 'form-body'>
        <input type="text" name="index" class="input" id="inputKeywords" value="$keywords"/>
        <input type="submit" value="搜索一下" class="btn btn-submit"/>
        $clearText
        </div>
        </form>
    </div>
EOT;

if(!$keywords):
$context .= <<<EOT
<div class="row">
<p><a href="http://wx.pinexperts.com/gii" class="link" target="_blank">私人顾问网 - 微信</a></p>
</div>
<br>
EOT;
endif;

if($historyRecorders):
$context .= <<<EOT
    <div><p>历史记录：
EOT;

    $nums = count($historyRecorders);

$count = <<<EOT
    <font>$nums</font>
EOT;

foreach ($historyRecorders as $key => $value) :
    $context .= <<<EOT
    
<span class="view-history" style="width: auto;margin: 0 10px;cursor:pointer;" search-keywords="$key" title ="$key">$key</span>
EOT;
endforeach;

$context .= <<<EOT
    </p>
    $count
    <span class="edit-label" id="edit-label"><img src="/imgs/edit.png" alt="编辑" width="16px" height="16px"/></span>
    <span class="delete-label" id="delete-label"><img src="/imgs/delete.png" alt="删除" width="16px" height="16px"/></span>
    </div>
EOT;
endif;

if ($keywords):
    $context .= <<<EOT
        <div>
        <p>关键词：<span class="view-history" style="width: auto;margin: 0 10px;cursor:pointer;" search-keywords="$keywords">$keywords</span></p>
    </div>
EOT;

    if ($resUrls || $resNames):
        $context .= <<<EOT
    <div>
        $resUrls
</div>    
<div>
        $resNames
</div>
EOT;
    else:
        $context .= <<<EOT
        <p>相关网页：</p>
        <iframe frameborder="0" src="http://www.baidu.com/s?wd=$keywords" style="width: 100%;height:1500px; overflow-x: hidden" id="iframeId"></iframe>
EOT;


    endif;

endif;

$context .= <<<EOT

<footer></footer>

<script type="text/javascript">
    $(function () {
        $(".link").bind('click', clickCount);
        

        
    }) ;

    

</script>
EOT;

$javascriptContent = <<<EOT
<script type="text/javascript">
    window.onload = function() {
        var dom = document.getElementById('inputKeywords');
        if (!dom.value)
        dom.focus();
        
        dom.addEventListener('focus', function() {
           inputListener(this);
        });        
        
        dom.addEventListener('input', function() {
           inputListener(this);
        });
        
        dom.addEventListener('change', function() {
           inputListener(this);
        });
        
        document.body.addEventListener('keydown', function(e) {
          if (e.keyCode == 57) ;
             document.getElementById('inputKeywords').focus();
        });
        var edit = document.getElementById('edit-label');
        if (edit)
            edit.onclick = function () { alert(111); }
    };

    function inputListener(ele) {
        var c = document.getElementById('clearText');
            if (ele.value) {
                createEle();
            } else {
                if (c) c.remove();
            }
    }
    
    function createEle() {
      var c = document.getElementById('clearText');
      
      if (c)return;
      var b = document.getElementById('form-body');
      var d = document.getElementById('inputKeywords');
      var e = document.createElement('span');
      var t = document.createTextNode('×');
          e.id = 'clearText';
          e.onclick = function () { d.value = ''; this.remove(); }
          e.style.top = '0';
          e.style.left = '-150px';
          e.style.width = '40px';
          e.style.height = '40px';
          e.style.fontSize = '25px';
          e.style.lineHeight = '40px';
          e.style.position = 'relative';
          e.style.cursor = 'pointer';
          e.appendChild(t);
          b.appendChild(e);
    }
    
    function removeEle() {
        var c = document.getElementById('clearText');
        var d = document.getElementById('inputKeywords');

        if (d)
           d.value = ''; 
        if (c)
           c.remove(); 
    }
    
    window.addEventListener('offline', function() {
        // alert('离线了');
    });
    
    window.addEventListener('online', function() {
        // alert('上线了');
    });
    
    var elements = document.getElementsByClassName("view-history");
    if (elements.length) {
        for(var i in elements) {
            elements[i].onclick = function() {
              window.location.href = "/?index=" + this.getAttribute('search-keywords');
            };
            
        }
    }
</script>

<script type="text/javascript">
    function edit() {
        
    }
</script>



EOT;


view('layouts.master', compact('context', 'title', 'javascriptContent', 'linkStyle'));
