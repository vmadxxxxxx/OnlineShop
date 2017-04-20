$(function () {


    //ajax for deleting user from database and table
    var delBtnsUser = $('.btnDelUser');

    delBtnsUser.click(function () {

        var btnDelUser = $(this);

        var idUser = btnDelUser.parent().siblings().first().text();

        $.ajax({
            url: './resources/api/adminEditUser.php',
            dataType: 'json',
            data: 'id=' + idUser,
            type: 'DELETE',
            success: (btnDelUser.parent().parent().remove(), alert("User deleted"))
        });
    });

    //ajax for deleting item from database and table
    var delBtnsItem = $('.btnDelItem');

    delBtnsItem.click(function () {

        var btnDelItem = $(this);

        var idItem = btnDelItem.parent().siblings().first().text();

        var id = "id=" + idItem;

        $.ajax({
            url: './resources/api/adminEditItem.php',
            dataType: "json",
            data: id,
            type: 'DELETE'
        }).done(function (success) {
            if (success) {
                btnDelItem.parent().parent().remove();

            }
        }).fail(function () {
            alert('huj');
        });





    });

});




