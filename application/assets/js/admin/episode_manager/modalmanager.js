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


$('.edit-episode-button').on("click", function () {
    let episodeId = $(this).attr("episode-target");
    let categoryId = $('#episodesTable').attr("category-target");

    // Select data row in table
    let row = $("#episode-" + episodeId + "-record");

    // get usefull data
    let episode_title = row.find("#episodeTitle").text();
    let episode_desc = row.find("#episodeDescription").text();
    let episode_link = row.find("#episodeLink").attr("episode-identifier");

    // insert data into modal
    $("#episodeNameModal").val(episode_title).trigger("change");
    $("#episodeDescriptionModal").val(episode_desc).trigger("change");
    $('#episodeLinkModal').val(episode_link).trigger("change");

    // Setup new link for api call
    $("#modalUpdateForm").prop("action", '/api/episode/update/'+ categoryId +'/' + episodeId);

    // show modal
    $('#editEpisodeModal').modal('show');
    console.log("[*] Opened edit category modal");

    $("#submitSalvaModificheModal").on("click", function () {
        $("#modalUpdateForm").submit();
    });
});
