$(function () {


    //ajax for deleting user from database and list
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

    //ajax for deleting item from database and list
    var delBtnsItem = $('.btnDelItem');

    delBtnsItem.click(function () {

        var btnDelItem = $(this);

        var idItem = btnDelItem.parent().siblings().first().text();
console.log(idItem);
        $.ajax({
            url: './resources/api/adminEditItem.php',
            dataType: 'json',
            data: 'id=' + idItem,
            type: 'DELETE',
            success: (btnDelItem.parent().parent().remove(), alert("Item deleted"))
        });
    });

});




