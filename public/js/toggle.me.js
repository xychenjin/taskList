/**
 * Created by jim on 2017/9/13.
 */
$.fn.toggleMe = function (obj) {
    var dom = $(this);
    dom.bind("click", function () {
        if (! dom.hasClass("fold")) {
            dom.nextAll().each(function (item, obj) {
                $(obj).hide();
            });
            dom.addClass("fold");
            dom.find("b").html("&lt");
        } else {
            dom.nextAll().each(function (item, obj) {
                $(obj).show();
            });
            dom.removeClass("fold");
            dom.find("b").html("&gt");
        }
    });
};