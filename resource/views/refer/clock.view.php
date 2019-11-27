<?php

$title = '倒计时计算器';

$linkStyle = <<<EOT
<style>
    .clock{}
</style>
EOT;


$context = <<<EOT
<script >
setInterval(function (){loadtime()}, 1000);
function loadtime() {
    var currentTime = new Date();
    var festivalTime = '2020-01-24 00:00:00';

    //毫秒
    var diffTime = parseInt((Date.parse(festivalTime) - currentTime.getTime())/1000);

    var month = parseInt(diffTime / (30 * 60 * 24 * 60));
    var day = parseInt((diffTime) / (60 * 24 * 60));
    var days = parseInt((diffTime - month * (30 * 60 * 24 * 60)) / (60 * 24 * 60));
    var hours = parseInt((diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60)) / (60 * 60));
    var minutes = parseInt((diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60))/60);
    var seconds = diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60) - minutes * 60;

    var info = "距离2020年春节还有：共"+ day +"天 , "+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒";
    // console.info("距离过年还有："+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒");
    
    if (document.getElementsByClassName('clock').length) {
        document.getElementsByClassName('clock')[0].innerHTML = info;
    } 
    else {
         document.getElementsByClassName('container')[0].innerHTML = "<div class='clock'>" + info+ "</div";
    }
   
}

// loadtime();
</script>
EOT;

view('layouts.master', ['context' => $context, 'title' => $title]);