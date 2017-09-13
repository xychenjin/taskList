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
        destinationLeft: this.bodyWidth - this.originElementLeft - (2 * this.innerElementWidth)
    };

    initPosition(moveElement);

    moveElement.bind({
        click: function () {
            var dom = $(this);

            if (!intervalCounter) {
                animateThis(dom);

                var count = 0;
                intervalCounter = setInterval(function () {
                    animateThis(dom);
                    count++;
                    $(".auto-run").text(count);
                }, 2000);

                dom.text(innerBtnText(1));
                dom.css({color: "yellow", background: "red"});

            } else {
                clearInterval(intervalCounter);
                intervalCounter = null;
                $(".auto-run").text(0);
            }
        },
        mouseenter:function () {
            if (intervalCounter)
            $(this).text(innerBtnText(3));
        },
        mouseleave:function () {
            if (! intervalCounter)
            $(this).text(innerBtnText(0));
        }
    });
};

// });
var intervalCounter = null;

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

//随机数生成方向
var makeDirection = function(element) {
    var direction = [];
    var elementOffsetTop = element[0].offsetTop;
    var elementOffsetLeft = element[0].offsetLeft;
    switch (true) {
        case elementOffsetTop == parseInt(position.destinationTop) + parseInt(position.originTop)
        && elementOffsetLeft == parseInt(position.destinationLeft) + parseInt(position.originLeft)
        :
            direction = ['UP', 'LEFT'];
            break;
        case elementOffsetTop == position.originTop
        && elementOffsetLeft == parseInt(position.destinationLeft) + parseInt(position.originLeft)
        :
            direction = ['DOWN', 'LEFT'];
            break;
        case elementOffsetTop == parseInt(position.destinationTop) + parseInt(position.originTop)
        && elementOffsetLeft == position.originLeft
        :
            direction = ['UP', 'RIGHT'];
            break;
        case elementOffsetTop == position.originTop
        && elementOffsetLeft == position.originLeft
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
            destination.left = (elementOffsetTop == parseInt(position.destinationTop) + parseInt(position.originTop)
            && elementOffsetLeft == position.originLeft) ? 0 : position.destinationLeft ;

            break;
        case "DOWN":
            destination.top = position.destinationTop;

            destination.left = (elementOffsetTop == position.originTop
            && elementOffsetLeft == position.originLeft) ? 0 : position.destinationLeft;
            break;
        case "LEFT":
            destination.left = 0;

            destination.top = (elementOffsetTop == position.originTop
            && elementOffsetLeft == parseInt(position.destinationLeft) + parseInt(position.originLeft)) ? 0 : position.destinationTop;

            break;

        case "RIGHT":
            destination.left = position.destinationLeft;
            destination.top = (elementOffsetTop == position.originTop
            && elementOffsetLeft == position.originLeft) ? 0 : position.destinationTop;
            break;
    }
    destination && element ? doAnimate(element, destination) : '';
}

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