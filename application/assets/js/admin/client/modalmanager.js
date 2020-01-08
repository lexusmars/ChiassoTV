console.log("[!] modal manager loaded");

$('.delete-client-button').on("click", function(){
    // get category id
    let id = $(this).attr("client-target");

    // insert data into modal
    let infoNode = $("#clientData" + id);

    // read name + surname
    let name = infoNode.find("#clientName").text();
    let surname = infoNode.find("#clientSurname").text();

    console.log(name + " " + surname);

    // Insert data into modal
    $('#modalEliminaMessaggio').text("Sei sicuro di voler eliminare il cliente '" + name + " " + surname + "'?");

    // change url. It will call the websites APIs
    $("#eliminaButton").attr("href", '/api/client/delete/'+ id);

    // Show modal
    $('#modalConfirmDelete').modal('show');

    console.log("[*] Opened delete confirmation modal")
});


$('.edit-client-button').on("click", function () {
    // get category id
    let id = $(this).attr("client-target");

    // insert data into modal
    let infoNode = $("#clientData" + id);

    // read data
    let name = infoNode.find("#clientName").text();
    let surname = infoNode.find("#clientSurname").text();
    let email = infoNode.find("#clientEmail").text();
    let phone = infoNode.find("#clientPhone").text();

    // insert data into modal
    $("#clientNameModal").val(name).trigger("change");
    $("#clientSurnameModal").val(surname).trigger("change");
    $('#clientEmailModal').val(email).trigger("change");
    $('#clientPhoneModal').val(phone).trigger("change");

    // Change api url
    $("#modalUpdateForm").prop("action", "/api/client/update/" + id);

    // show modal
    $('#modalEditClient').modal('show');
    console.log("[*] Opened edit category modal");

    // Click handler: submit on client
    $("#submitSalvaModificheModal").on("click", function () {
        $("#modalUpdateForm").submit();
    });
});