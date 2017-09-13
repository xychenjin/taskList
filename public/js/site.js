/**
 * Created by jim on 2017/9/4.
 */
function clickCount() {
    var dom = $(this);
    $.post(
        '/countClick',
        {name: dom.attr('href')},
        function (res) {
            // window.location.href = dom.data('url');
            console.info('1111');
        }
    );

}

