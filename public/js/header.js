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
    $("body").css({
        "background-image": "url(" + path + ")",
    });

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
    $("body").css({
        "background-image": "url(" + path + ")",
        "color" : "#ffffff",
    });
}