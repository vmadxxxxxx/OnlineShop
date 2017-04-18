$(function () {

    var delBtnsUser = $('.btnDelUser');

    delBtnsUser.click(function (e) {

        e.preventDefault();
        var btn = $(this);
        
        var id = btn.parent().siblings().first().text();
       
        
       console.log(id);
        
        
        $.ajax({
            url: './resources/api/admin.php',
            dataType: 'json',
            data: 'id='+id,
            type: 'DELETE'

        }).done(function () {
            btn.parent().parent().remove();
            alert('jes');

        }).fail(function () {
            alert('chujnia');
        });


    });


});


