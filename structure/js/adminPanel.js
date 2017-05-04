$(function () {

// in the edit buttons there should be used strreplace fnction or similar because sending data with json will send only first word untill first space

    //OPERATIONS ON USERS TABLE
    //
    //event for edit user button - creating edit form
    var editBtnsUser = $('.btnEditUser');

    editBtnsUser.on('click', function () {
        var name = $(this).parent().parent().find('.userName').text();
        var surname = $(this).parent().parent().find('.userSurname').text();
        var email = $(this).parent().parent().find('.userEmail').text();

        var form = (' <form><label>Name<input name="newName" type="text" value=' + name + '></label>\n\
                            <label>Surname<input type="text" name="newSurname" value=' + surname + '></label>\n\
                            <label>E-mail<input type="email" name="newEmail" value=' + email + '></label>\n\
                            <button class="btn btn-info" id="userEditConf" type="submit">Confirm</button></form>');
        $(this).parent().append(form); //added form
        $(this).attr("disabled", true); //blocking edit button 
    });

    //event for confirming edit user
    var tr = $('.trUsers');

    tr.on('click', 'button#userEditConf', function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().parent().find('.userId').text();
        var name = $(this).parent().parent().parent().find('input[name=newName]').val();
        var surname = $(this).parent().find('input[name=newSurname]').val();
        var email = $(this).parent().find('input[name=newEmail]').val();
        confBtn = $(this);

        $.ajax({
            url: 'resources/api/adminEditUser.php',
            dataType: 'json',
            data: {id: id, name: name, surname: surname, email: email},
            type: 'PUT'
        }).done(function (success) {
            if (success) {

                confBtn.parent().parent().parent().fadeOut(400, function () {
                    confBtn.parent().parent().parent().fadeIn().delay(1000);
                    confBtn.parent().parent().parent().find('.userName').text(name);
                    confBtn.parent().parent().parent().find('.userSurname').text(surname);
                    confBtn.parent().parent().parent().find('.userEmail').text(email);
                    confBtn.parent().parent().find('.btnEditUser').attr("disabled", false);
                    confBtn.parent().remove();
                });
            }
        }).fail(function () {
            alert('Something went wrong');
        });

    });

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

    //OPERTATIONS ON ITEM TABLE
    //
    //event for edit user button - creating edit form

    var editBtnsItem = $('.btnEditItem');

    editBtnsItem.on('click', function () {
        var name = $(this).parent().parent().find('.itemName').text();
        var price = $(this).parent().parent().find('.itemPrice').text();
        var description = $(this).parent().parent().find('.itemDescription').text();
        var form = (' <form><label>Name<input name="newName" type="text" value=' + name + '></label>\n\
                            <label>Price<input type="text" name="newPrice" value=' + price + '></label>\n\
                            <label>Description<input type="text" name="newDescription" value=' + description + '></label>\n\
                            <button class="btn btn-info" id="itemEditConf" type="submit">Confirm</button></form>');
        $(this).parent().append(form); //added form
        $(this).attr("disabled", true); //blocking edit button 
    });

    //event for confirming edit item
    var tr = $('.trItems');

    tr.on('click', 'button#itemEditConf', function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().parent().find('.itemId').text();
        var name = $(this).parent().parent().parent().find('input[name=newName]').val();
        var price = $(this).parent().find('input[name=newPrice]').val();
        var description = $(this).parent().find('input[name=newDescription]').val();
        confBtn = $(this);

        $.ajax({
            url: 'resources/api/adminEditItem.php',
            dataType: 'json',
            data: {id: id, name: name, price: price, description: description},
            type: 'PUT'
        }).done(function (success) {
            if (success) {

                confBtn.parent().parent().parent().fadeOut(400, function () {
                    confBtn.parent().parent().parent().fadeIn().delay(1000);
                    confBtn.parent().parent().parent().find('.itemName').text(name);
                    confBtn.parent().parent().parent().find('.itemPrice').text(price);
                    confBtn.parent().parent().parent().find('.itemDescription').text(description);
                    confBtn.parent().parent().find('.btnEditItem').attr("disabled", false);
                    confBtn.parent().remove();
                });
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

    //OPERATIONS ON ADMIN TABLE
    //
    //event for edit admin button - creating edit form

    var trAdm = $('.trAdmins');
    var editBtnsAdmin = $('.btnEditAdmin');

    editBtnsAdmin.on('click', function () {
        var name = $(this).parent().parent().find('.adminName').text();
        var email = $(this).parent().parent().find('.adminEmail').text();
        var form = (' <form><label>Name<input name="newAdminName" type="text" value=' + name + '></label>\n\
                            <label>Email<input type="text" name="newAdminEmail" value=' + email + '></label>\n\
                            <button class="btn btn-info" id="adminEditConf" type="submit">Confirm</button></form>');
        $(this).parent().append(form); //added form
        $(this).attr("disabled", true); //blocking edit button 
    });

    //event for clicking confirm edit Admin
    
    trAdm.on('click', 'button#adminEditConf', function (e) {
        e.preventDefault();
        var id = $(this).parent().parent().parent().find('.adminId').text();
        var name = $(this).parent().parent().parent().find('input[name=newAdminName]').val();
        var email = $(this).parent().find('input[name=newAdminEmail]').val();
        confBtn = $(this);

        $.ajax({
            url: 'resources/api/adminEditAdmin.php',
            dataType: 'json',
            data: {id: id, name: name, email: email},
            type: 'PUT'
        }).done(function (success) {
            if (success) {

                confBtn.parent().parent().parent().fadeOut(400, function () {
                    confBtn.parent().parent().parent().fadeIn().delay(1000);
                    confBtn.parent().parent().parent().find('.adminName').text(name);
                    confBtn.parent().parent().parent().find('.adminEmail').text(email);
                    confBtn.parent().parent().find('.btnEditAdmin').attr("disabled", false);
                    confBtn.parent().remove();
                });
            }
        }).fail(function () {
            alert('Something went wrong');
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





