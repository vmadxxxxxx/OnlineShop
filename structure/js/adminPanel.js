$(function () {

    var delBtnsUser = $('.btnDelUser');

    delBtnsUser.click(function () {


        var btn = $(this);

        var id = btn.parent().siblings().first().text();

        $.ajax({
            url: 'adminPanel.php',
            dataType: 'json',
            data: 'id=' + id,
            type: 'DELETE',
          success: (btn.parent().parent().remove(), alert("User deleted"))
        });




    });
});


