/**
 * Created by jim on 2019/4/26.
 */

var lastPng;

function getPath() {
    var quarter = parseInt(Math.random()*4,10)+1;

    var moment = 'am';
    if (quarter <= 2) {
        moment = 'am';
    } else {
        moment = 'pm';
    }

    var path = "../imgs/" + quarter + '/' + moment + ".jpg";

    if (lastPng == path) {
        return getPath();
    }

    return path;
}

$("body").on('click', '.change-bg', function() {
    var path = getPath();

    lastPng = path;
    console.info(lastPng);

    showBg(path);

    $(".footer .hide-bg").html("一键隐藏背景");
    return false;
});

//加载背景图
loadBg();

function loadBg() {
    var date = new Date();

    var month = date.getMonth();

    var quarter = 1;
    if (month >= 0 && month<=2) {
        quarter = 1;
    }else if(month >= 3 && month<=5) {
        quarter = 2;
    }else if(month >= 6 && month<=8) {
        quarter = 3;
    }else if(month >= 9 && month<=11) {
        quarter = 4;
    }

    var moment = 'am';

    var time = date.getHours();

    if (time>=0 && time<=12) {
        moment = 'am';
    }else if(time>=13 && time<=23) {
        moment = 'pm';
    }
    var path = "../imgs/" + quarter + '/' + moment + ".jpg";

    lastPng = path;
    console.info(path);

    showBg(path);
}

$("body").on('click', ".footer .hide-bg", function () {

    var dom = $(this);

    toggleBg(dom);

});

$(".footer .hide-bg").hover(function () {

    var dom = $(this);

   dom.css("opacity", 1);
}, function () {

    var dom = $(this);

    dom.css("opacity", 0);
});



function showBg(path) {
    $("body").css("background", "url(" + path + ")");
    $("body a").css("color", "#ffffff");
}

function hideBg() {
    $("body").css("background", "none");
    $("body").css("opacity", "1");
    $("body a").css("color", "#000000");
}

function toggleBg(dom) {
    if (dom.html() == '一键隐藏背景') {
        hideBg();
        dom.html("一键加载背景");
    } else {
        loadBg();
        dom.html("一键隐藏背景");
    }
}

function getBg(dom) {
    var topimg = $("body").css("backgroundImage");

    topimg = topimg.split('(')[1].split(')')[0];
    if(topimg.indexOf('"') > -1){
        topimg = topimg.split('"')[1].split('"')[0];
    }

    return $(dom).attr("href", topimg);
}