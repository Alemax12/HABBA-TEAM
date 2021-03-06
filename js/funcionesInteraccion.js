
function operaciones() {

    $(".ocultar").hide();
    $("#formulario").hide();
    $("#inputLike").change(function() {
        if($("#inputLike").val()==1){
            $("#inputCommentDiv").hide();
            $("#inputComment").val(null);
        }else{
            $("#inputCommentDiv").show();
        }
    })
    $("#nuevo").click(function () {
        $(".ocultar").hide();
        $("#formulario").show();
        $("#inputID").prop("disabled", false);
        $(this).hide();
        $("#editar").hide();
        $("#save").text("Save");
        $(".div_id").hide();
    });
    $("#cancel").click(function () {
        $("#formulario").hide();
        $("#formins").hide();
        $("#nuevo").show();
        $("#editar").show();
        $("#inputEP").show();
        $("#form1").trigger("reset");
    });

    $("#save").click(function (e) {
        e.preventDefault();
        $("#inputID").prop("disabled", false);
        var datos = $("#form1").serialize();
        var ruta = "";
        if ($(this).text() == "Save") {
            ruta = "../CRUD/interaccion/GuardarInteraccion.php";
        } else {
            ruta = "../CRUD/interaccion/EditarInteraccion.php";
        }
        console.log(datos);
        $.ajax({
            url: ruta,
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
                    type: 'Error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });

    });

    $(".delete").click(function () {

        Swal.fire({
            title: 'Delete Procedur',
            text: "Are you sure you want to delete this interaction?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: 'lightgray',
            cancelButtonText: "Cancel",
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                const id = $(this).data("id");
                $.ajax({
                    url: "../CRUD/interaccion/EliminarInteraccion.php",
                    method: "POST",
                    data: { id: id }, 
                    dataType: "html"
                })

                    .done(function (data) {
                        location.reload();
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
    });

    $(".edit").click(function () {
        const id = $(this).data("id");
        $.ajax({
            url: "../CRUD/interaccion/ConsultarInteraccion.php",
            method: "POST",
            data: { id: id }, 
            dataType: "json"
        })

            .done(function (data) {
                console.log(data);
                $("#save").text("Update");
                $("#inputID").prop("disabled", true);
                $("#inputID").val(data.id_interaccion);
                $("#inputEmp").val(data.id_usuario);
                $("#inputCli").val(data.id_mascota);
                $("#inputDate").val(data.fecha_interaccion);
                $("#inputComment").val(data.comentarios);
                if(data.megusta==1){
                    $("#inputCommentDiv").hide();
                }else{
                    $("#inputCommentDiv").show();
                }
                $("#inputLike").val(data.megusta);
                $("#formulario").show();
                $("#nuevo").hide();
                $(".div_id").show();
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
    });
  

}