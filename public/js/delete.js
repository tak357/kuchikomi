// 記事削除
$(function(){
    $("#itemDelete").click(function() {
        alert("記事を削除してもよろしいですか？");
        var itemId = "form_" + $(this).attr("data-id");
        document.getElementById(itemId).submit();
        // 別の書き方
        // document.getElementById('form_' + this.dataset.id).submit();
    });
});

// 口コミ削除
// TODO:削除確認メッセージ
(function () {
    'use strict';

    let cmds_kuchikomi = document.getElementById('kuchikomi_del');
    let j;

    for (j = 0; j < cmds.length; j++) {
        cmds[j].addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('クチコミを削除してもよろしいですか？')) {
                document.getElementById('kuchikomi_form').submit();
            }
        });
    }
})();

// 検索キーワードの入力チェック
$(function() {
    $("#search_btn").click(function() {
        if (!$("#search_keyword").val()) {
            alert("検索キーワードを入力してください");
            return false;
        }
    });
});