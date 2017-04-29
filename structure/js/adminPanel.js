$(function () {

    //OPERATIONS ON USERS TABLE

    //event for clicking delete user button
    var delBtnsUser = $('.btnDelUser');

    delBtnsUser.click(function () {

        var btnDelUser = $(this);

        var idUser = btnDelUser.parent().siblings().first().text();
        //ajax for deleting user from database and table
        $.ajax({
            url: './resources/api/adminEditUser.php',
            dataType: 'json',
            data: 'id=' + idUser,
            type: 'DELETE'
            }).done(function (success) {
            if (success) {
                btnDelUser.parent().parent().remove();
            }
        }).fail(function () {
            alert('error');
        });
    });

    //event for edit user button - creating edit form
    var editBtnsUser = $('.btnEditUser');
    
    editBtnsUser.on('click', function () {
       var name = $(this).parent().parent().find('#userName').text();
       var surname = $(this).parent().parent().find('#userSurname').text();
       var email = $(this).parent().parent().find('#userEmail').text();
       
       var form = (' <form><label>Name<input type="text" value='+name+'></label>\n\
                            <label>Surname<input type="text" value='+surname+'></label><label>E-mail<input type="email" value='+email+'></label>\n\
                            <button class="btn btn-info" id="userEditConf" type="submit">Confirm</button></form>');
       $(this).parent().append(form); //added form
       $(this).attr("disabled", true); //blocking edit button 
    });
    
   //event for confirming edit user
   var divTable = $('.tableUsers');
   
   divTable.on('click', 'button#userEditConf', function (e) {
      e.preventDefault();
      
      $.ajax({
          url: 'resources/api/adminEditUser.php',
          dataType: 'json',
          data: {name: name, surname: surname, email: email},
          type: 'PUT'
      }).done (function (success) {
          if (success) {
              alert('hurra');
          }
      }).fail(function () {
         alert('Something went wrong'); 
      });
      
   });
   

    //event for clicking delete item button
    var delBtnsItem = $('.btnDelItem');

    delBtnsItem.click(function () {

        var btnDelItem = $(this);

        var idItem = btnDelItem.parent().siblings().first().text();

        var id = "id=" + idItem;
        //ajax for deleting item from database and table
        $.ajax({
            url: 'resources/api/adminEditItem.php',
            dataType: 'json',
            data: id,
            type: 'DELETE'
        }).done(function (success) {
            if (success) {
                btnDelItem.parent().parent().remove();
            }
        }).fail(function () {
            alert('error');
        });
    });


    //event for clicking delete admin button
    var delBtnsAdmin = $('.btnDelAdmin');

    delBtnsAdmin.click(function () {

        var btnDelAdmin = $(this);

        var idAdmin = btnDelAdmin.parent().siblings().first().text();

        var id = "id=" + idAdmin;
        //ajax for deleting admin from database and table
        $.ajax({
            url: 'resources/api/adminEditAdmin.php',
            dataType: 'json',
            data: id,
            type: 'DELETE'
        }).done(function (success) {
            if (success) {
                btnDelAdmin.parent().parent().remove();
            }
        }).fail(function () {
            alert('error');
        });
    });

});





