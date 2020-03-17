(function () {
    'use strict';

    let cmds_kuchikomi = document.getElementById('kuchikomi_del');

    cmds_kuchikomi.addEventListener('click', function (e) {
        e.preventDefault();
        if (confirm('クチコミを削除してもよろしいですか？')) {
            document.getElementById('kuchikomi_form').submit();
        }
    });
})();
