(function () {
    'use strict';

    // let cmds = document.getElementsByClassName('del');
    let cmds = document.getElementById('item_del');
    let i;

    // for (i = 0; i < cmds.length; i++) {
    //     cmds[i].addEventListener('click', function (e) {
    cmds.addEventListener('click', function (e) {
        e.preventDefault();
        if (confirm('記事を削除してもよろしいですか？')) {
            // document.getElementById('form_' + this.dataset.id).submit();
            document.getElementById('item_form_' + this.dataset.id).submit();
        }
    });
    // }
})();
