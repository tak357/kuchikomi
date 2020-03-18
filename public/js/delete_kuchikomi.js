(function () {
    'use strict';

    let cmds_kuchikomi = document.getElementById('kuchikomi_del');
    let j;

    for (j = 0; j < cmds.length; j++) {
        cmds[j].addEventListener('click', function (e) {
            // cmds_kuchikomi.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('クチコミを削除してもよろしいですか？')) {
                document.getElementById('kuchikomi_form').submit();
            }
        });
    }
})();
