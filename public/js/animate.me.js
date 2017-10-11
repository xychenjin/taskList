/**
 * Created by jim on 2017/9/13.
 */

// jQuery.fn.extend({
$.fn.initAnimation = function (inputMoveElement) {
    var moveElement = (inputMoveElement === undefined) ? $(this) : inputMoveElement;

    this.originElementTop = moveElement[0].offsetTop;
    this.originElementLeft = moveElement[0].offsetLeft;

    this.innerElementHeight = moveElement.height();
    this.innerElementWidth = moveElement.width();

    this.bodyHeight = $(window).height();
    this.bodyWidth = $(window).width();

    position = {
        originTop: this.originElementTop,
        originLeft: this.originElementLeft,
        destinationTop: this.bodyHeight - this.originElementTop - (2 * this.innerElementHeight) - 10,
        destinationLeft: this.bodyWidth - this.originElementLeft - (2 * this.innerElementWidth),
        bodyHeight:this.bodyHeight,
        bodyWidth:this.bodyWidth,
        innerElementHeight:this.innerElementHeight,
        innerElementWidth:this.innerElementWidth,
    };

    initPosition(moveElement);

    moveElement.bind({
        click: function () {
            var dom = $(this);

            if (!intervalMovementCounter) {

                animateThis(dom);

                //加入运行次数计时器
                addIntervalMovementCounter(dom);
                //加入运行次数时间计算器
                addIntervalMovementTimeCounter();

                dom.text(innerBtnText(1));
                dom.css({color: "yellow", background: "red"});

            } else {
                clearInterval(intervalMovementCounter);
                clearInterval(intervalMovementTimeCounter);
                intervalMovementCounter = null;
                // $(".auto-run").text(0);
            }
        },
        mouseenter:function () {
            if (intervalMovementCounter) {
                $(this).text(innerBtnText(3));
                $(this).css({color:"white"});
            }

        },
        mouseleave:function () {
            if (! intervalMovementCounter) {
                $(this).text(innerBtnText(0));
                $(this).css({color:"black"});
            }
        }
    });
};

// });
var intervalMovementCounter = null;
var intervalMovementTimeCounter = null;

var innerBtnText = function (index) {
    var txt = [
        "开始", "追我啊", "准备","停止"
    ];

    if (index === undefined) {
        return txt;
    }

    return txt[index];
};

var position = {};

var accuracy = 80;

var pointer = {
    rightDown : function (elementOffsetTop, elementOffsetLeft) {
        return (elementOffsetTop <= parseInt(position.destinationTop) + parseInt(position.originTop) + accuracy)
            && (elementOffsetTop >= parseInt(position.destinationTop) + parseInt(position.originTop) - accuracy)
            && (elementOffsetLeft <= parseInt(position.destinationLeft) + parseInt(position.originLeft) + accuracy)
            && (elementOffsetLeft >= parseInt(position.destinationLeft) + parseInt(position.originLeft) - accuracy );
    },
    rightUp : function (elementOffsetTop, elementOffsetLeft) {
        return (elementOffsetTop <= position.originTop + accuracy )
        && (elementOffsetTop >= position.originTop - accuracy)
        && (elementOffsetLeft <= parseInt(position.destinationLeft) + parseInt(position.originLeft) + accuracy)
        && (elementOffsetLeft >= parseInt(position.destinationLeft) + parseInt(position.originLeft) - accuracy);
    },
    leftUp : function (elementOffsetTop, elementOffsetLeft) {
        return (elementOffsetTop <= position.originTop + accuracy)
            && (elementOffsetTop >= position.originTop - accuracy)
            && (elementOffsetLeft <= position.originLeft + accuracy)
            && (elementOffsetLeft >= position.originLeft - accuracy);
    },
    leftDown : function (elementOffsetTop, elementOffsetLeft) {
        return ( elementOffsetTop <= parseInt(position.destinationTop) + parseInt(position.originTop) + accuracy)
            && ( elementOffsetTop >= parseInt(position.destinationTop) + parseInt(position.originTop) - accuracy)
            && (elementOffsetLeft >= position.originLeft - accuracy)
            && (elementOffsetLeft <= position.originLeft + accuracy);
    },
};

//随机数生成方向
var makeDirection = function(element) {
    var direction = [];
    var elementOffsetTop = element[0].offsetTop;
    var elementOffsetLeft = element[0].offsetLeft;
    switch (true) {
        case pointer.rightDown(elementOffsetTop, elementOffsetLeft)
        :
            direction = ['UP', 'LEFT'];
            break;
        case pointer.rightUp(elementOffsetTop, elementOffsetLeft)
        :
            direction = ['DOWN', 'LEFT'];
            break;
        case pointer.leftDown(elementOffsetTop, elementOffsetLeft)
        :
            direction = ['UP', 'RIGHT'];
            break;
        case pointer.leftUp(elementOffsetTop, elementOffsetLeft)
        :
            direction = ['DOWN', 'RIGHT'];
            break;
    }

    return direction[Math.round(Math.random())];
};

function animateThis(element) {
    var destination = {};
    var elementOffsetTop = element[0].offsetTop;
    var elementOffsetLeft = element[0].offsetLeft;
    var direction = makeDirection(element);
    switch (direction) {
        case "UP":
            destination.top = 0;
            destination.left = pointer.leftDown(elementOffsetTop, elementOffsetLeft) ? 0 : position.destinationLeft ;
            break;

        case "DOWN":
            destination.top = position.destinationTop;
            destination.left = pointer.leftUp(elementOffsetTop, elementOffsetLeft) ? 0 : position.destinationLeft;
            break;

        case "LEFT":
            destination.left = 0;
            destination.top = pointer.rightUp(elementOffsetTop, elementOffsetLeft) ? 0 : position.destinationTop;
            break;

        case "RIGHT":
            destination.left = position.destinationLeft;
            destination.top = pointer.leftUp(elementOffsetTop, elementOffsetLeft) ? 0 : position.destinationTop;
            break;
    }

    destination && element ? readyAnimate(element) : '';
    destination && element ? doAnimate(element, destination) : '';
}

var readyAnimate = function (moveElement) {
    moveElement.text(innerBtnText(1));
    moveElement.css({color:"yellow", background: "red"});
};

var doAnimate = function(element, destination){
    element.animate(destination, 1200, "swing", function() {
        element.text(innerBtnText(0));
        element.css({color:"black", background: "#e9686b"});
    });
};

var initPosition = function(moveElement) {
    var initTop = [0, position.destinationTop];
    var initLeft = [0, position.destinationLeft];

    var newPosition = {
        top: initTop[Math.round(Math.random())],
        left: initLeft[Math.round(Math.random())]
    };

    doAnimate(moveElement, newPosition);

    if (newPosition.top != 0 || newPosition.left != 0) {
        moveElement.text(innerBtnText(2));
        moveElement.css({color:"yellow", background: "red"});
    }

};

var addIntervalMovementCounter = function (dom) {
    var count = 0;
    intervalMovementCounter = setInterval(function () {
        animateThis(dom);
        count++;

        $(".auto-run").text(count);
    }, 2000);
};

var addIntervalMovementTimeCounter = function () {
    var date = (new Date()).toTimeString();
    var timeCounter = 1;
    intervalMovementTimeCounter = setInterval(function () {
        var autoDefiner = $(".auto-definer");
        if (! autoDefiner.find("small").length) {
            autoDefiner.append(" 开始时间：" + date + " 已运行：<small>" + timeCounter + "</small> s");
        } else {
            autoDefiner.find("small").text(formatIntervalTimeCounter(timeCounter));
        }
        timeCounter ++;
    }, 1000);
};

var formatIntervalTimeCounter = function (time) {
    switch (true) {
        case time < 60 :
            return time;
        case time >= 60 && time < 3600:
            return (parseInt(time/60) < 10 ? "0" + parseInt(time/60) : parseInt(time/60)) + ":" + (time%60 < 10 ? "0"+ time%60 : time%60);
        case time >= 3600:
            var hour = parseInt(time / 3600);
            var minute = time - hour * 3600;
            var second = time - parseInt(time / 3600) * 3600 - parseInt(minute / 60) * 60;
            return (hour < 10 ? "0" + hour : hour) + (minute > 60 ? (parseInt(minute/60) < 10 ? "0"+ parseInt(minute/60) : parseInt(minute/60)) : "00")
                + (second < 10 ? "0" + second : second);
    }
};