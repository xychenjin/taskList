<?php

$title = '倒计时计算器';

$linkStyle = <<<EOT
<style>
    .clock{}
</style>
EOT;


$context = <<<EOT
开始时间：<input type="text" id ="start"/>
结束时间：<input type="text" id="end" />

<button type="button" id="calcDiff">计算</button>
EOT;

$javascriptContent = <<<EOT
<script >
setInterval(function (){loadtime()}, 1000);
function loadtime() {
    var currentTime = new Date();
    var year = currentTime.getFullYear() + 1;
    var festivalTime = year + '-01-24 00:00:00';
    var endYearTime  = year + '-01-01 00:00:00';
    
    //毫秒
    var diffTime = parseInt((Date.parse(festivalTime) - currentTime.getTime())/1000);
    
    if (diffTime > 0 ) {
        var month = parseInt(diffTime / (30 * 60 * 24 * 60));
        var day = parseInt((diffTime) / (60 * 24 * 60));
        var days = parseInt((diffTime - month * (30 * 60 * 24 * 60)) / (60 * 24 * 60));
        var hours = parseInt((diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60)) / (60 * 60));
        var minutes = parseInt((diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60))/60);
        var seconds = diffTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60) - minutes * 60;
    
        var info = "距离"+ year+"年春节还有：共"+ day +"天 , "+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒";
        // console.info("距离过年还有："+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒");
        
        if (document.getElementsByClassName('festivalclock').length) {
            document.getElementsByClassName('festivalclock')[0].innerHTML = info;
        } 
        else {
             $(".container").append("<div class='festivalclock'>" + info+ "</div>");
        }
    }

   var diffEndYearTime = parseInt((Date.parse(endYearTime) - currentTime.getTime())/1000);
  
    if (diffEndYearTime > 0 ) {
        var month = parseInt(diffEndYearTime / (30 * 60 * 24 * 60));
        var day = parseInt((diffEndYearTime) / (60 * 24 * 60));
        var days = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60)) / (60 * 24 * 60));
        var hours = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60)) / (60 * 60));
        var minutes = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60))/60);
        var seconds = diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60) - minutes * 60;
    
        var info = "距离"+ year +"年结束还有：共"+ day +"天 , "+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒";
        // console.info("距离过年还有："+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒");
        
        if (document.getElementsByClassName('yearclock').length) {
            document.getElementsByClassName('yearclock')[0].innerHTML = info;
        } 
        else {
             $(".container").append("<div class='yearclock'>" + info+ "</div>");
        }
    } 
}

// loadtime();
</script>

<script>
    $("#calcDiff").click(function() {
       var date = new Date();
       
       var startDate = $("#start").val();
       var endDate = $("#end").val();
       
       if (! startDate || ! endDate) {
           return ;
       }
       
       startDate = Date.parse(startDate);
       endDate = Date.parse(endDate);
       startDate = startDate > endDate ? endDate: startDate;
       endDate = startDate > endDate ? startDate: endDate;
       
       var diffEndYearTime = parseInt((endDate - startDate)/1000);
       
        var month = parseInt(diffEndYearTime / (30 * 60 * 24 * 60));
        var day = parseInt((diffEndYearTime) / (60 * 24 * 60));
        var days = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60)) / (60 * 24 * 60));
        var hours = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60)) / (60 * 60));
        var minutes = parseInt((diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60))/60);
        var seconds = diffEndYearTime - month * (30 * 60 * 24 * 60) - days * (60 * 24 * 60) - hours * (60 * 60) - minutes * 60;
    
        var info = "时间相差：共"+ day +"天 , "+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒";
        // console.info("距离过年还有："+ month + "月" + days + "天"+hours + "小时"+ minutes + "分"+ seconds + "秒");
        
        if (document.getElementsByClassName('calcdiffclock').length) {
            document.getElementsByClassName('calcdiffclock')[0].innerHTML = info;
        } 
        else {
             $(".container").append("<div class='calcdiffclock'>" + info+ "</div>");
        }
       
    });

</script>
EOT;

view('layouts.master', ['context' => $context, 'title' => $title, 'javascriptContent' => $javascriptContent]);