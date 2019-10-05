console.log("[!] modal manager loaded");

$('.delete-category-button').on("click", function(){
    // get category id
    let id = $(this).attr("category-target");

    // insert data into modal
    let categoryName = $("#categoryName" + id).text();

    // Insert data into modal
    $('#modalEliminaMessaggio').text("Sei sicuro di voler eliminare la categoria '" + categoryName + "'?");

    // change url. It will call the websites APIs
    $("#eliminaButton").attr("href", '/api/category/delete/'+ id);

    // Show modal
    $('#modalConfirmDelete').modal('show');

    console.log("[*] Opened delete confirmation modal")
});


$('.edit-category-button').on("click", function () {
    // get category id
    let id = $(this).attr("category-target");

    // read all data
    let categoryName = $("#categoryName" + id).text();
    let categoryDescription = $("#categoryDescription" + id).text();
    let categoryImagePath = $("#categoryImagePath" + id).text();

    // insert data into modal
    $("#nomeCategoriaModal").val(categoryName).trigger("change");
    $("#descrizioneCategoriaModal").val(categoryDescription).trigger("change");
    $('#categoryImagePath').val(categoryImagePath);

    $("#modalUpdateForm").prop("action", "/api/category/update/" + id);

    // show modal
    $('#editCategory').modal('show');
    console.log("[*] Opened edit category modal");

    $("#submitSalvaModificheModal").on("click", function () {
        $("#modalUpdateForm").submit();
    });
});