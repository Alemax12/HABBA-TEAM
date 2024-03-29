function Logged() {

    $.ajax({
        url: "./php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
                $("#ConsultGroup").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                if (data.rol == "1") {
                    $("#TablesLeft").hide();
                }
            }

        })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('./php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });
}

function Logged1() {
    $("#save-usuario").hide();
    $("#cancel-usuario").hide();
    $.ajax({
        url: "../php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })
        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
                $("#ConsultGroup").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                $.ajax({
                    url: "../CRUD/usuario/ConsultarUsuario.php",
                    method: "POST",
                    data: { id: data.user },
                    dataType: "json"
                })

                    .done(function (data2) {
                        $("#save").text("Update");
                        $("#inputID").prop("disabled", true);
                        $("#inputID").val(data2.id_usuario);
                        $("#inputName").val(data2.nombre);
                        $("#inputFecNac").val(data2.fecha_nacimiento);
                        $("#inputCel").val(data2.celular);
                        $("#inputEmail").val(data2.email);
                        $("#inputPeso").val(data2.peso);
                        $("#inputEst").val(data2.estatura);
                        $("#inputDir").val(data2.direccion);
                        $("#inputContra").val(data2.contraseña);
                    })

                    .fail(function (jqXHR, textStatus) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'Error',
                            title: 'An error has occurred : ' + textStatus,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
            }

        })

        .fail(function (jqXHR, textStatus) {
        });

    $('#LogoutButton').click(function () {
        $.get('../php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });

    $('#EditMyUser').click(function () {
        $("#inputName_E").prop("disabled", false);
        $("#inputFecNac_E").prop("disabled", false);
        $("#inputCel_E").prop("disabled", false);
        $("#inputEmail_E").prop("disabled", false);
        $("#inputPeso_E").prop("disabled", false);
        $("#inputEst_E").prop("disabled", false);
        $("#inputDir_E").prop("disabled", false);
        $("#inputContra_E").prop("disabled", false);
        $("#inputName").prop("disabled", false);
        $("#inputFecNac").prop("disabled", false);
        $("#inputCel").prop("disabled", false);
        $("#inputEmail").prop("disabled", false);
        $("#inputPeso").prop("disabled", false);
        $("#inputEst").prop("disabled", false);
        $("#inputDir").prop("disabled", false);
        $("#inputContra").prop("disabled", false);
        $("#EditMyUser").hide();
        $("#save-emp").show();
        $("#cancel-emp").show();
        $("#save-usuario").show();
        $("#cancel-usuario").show();
    });

    $("#save-usuario").click(function (e) {
        e.preventDefault();
        $("#inputID").prop("disabled", false);
        $("#inputRol").prop("disabled", false);
        var datos = $("#form-usuario").serialize();
        console.log(datos);
        $.ajax({
            url: "../CRUD/usuario/EditarUsuario.php",
            method: "POST",
            data: datos,
            dataType: "html"
        })

            .done(function (data) {
                location.reload();
            })

            .fail(function (jqXHR, textStatus) {
                Swal.fire({
                    position: 'top-end',
                    type: 'error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });

    });
    $('#cancel-usuario').click(function () {
        location.reload();
    });
    $('#cancel-emp').click(function () {
        location.reload();
    });
}

function Logged2() {

    $.ajax({
        url: "../php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
                $("#ConsultGroup").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                if (data.rol == "1") {
                    $("#TablesLeft").hide();
                }
            }

        })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('./php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });
}