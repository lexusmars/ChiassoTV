console.log("[!] modal manager loaded");

$('.delete-episode-button').on("click", function(){
    // get category id and episode id
    let episodeId = $(this).attr("episode-target");
    let categoryId = $('#episodesTable').attr("category-target");

    // Select data row in table
    let row = $("#episode-" + episodeId + "-record");

    let episode_title = row.find("#episodeTitle").text();

    // Insert data into modal
    $('#modalEliminaMessaggio').text("Sei sicuro di voler eliminare l'episodio '" + episode_title+ "'?");

    // change url. It will call the websites APIs
    $("#eliminaButton").attr("href", '/api/episode/delete/'+ categoryId +'/' + episodeId);

    // Show modal
    $('#modalConfirmDelete').modal('show');
    console.log("[*] Opened delete confirmation modal")
});

/*
$('.edit-category-button').on("click", function () {
    let episode_number = row.find("#episodeNumber").text();

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
*/