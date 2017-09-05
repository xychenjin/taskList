/**
 * Created by jim on 2017/9/4.
 */
function clickCount() {
    var dom = $(this);
    $.post(
        dom.data('/countClick'),
        {name: dom.data('url')},
        function (res) {
            window.location.href = dom.data('url');
        }
    );
}

