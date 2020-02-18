$(document).ready(function () {
    // Setup listener for checkboxes
    $(".toggle-category").on("change", function () {
        let current_state = $(this).is(":checked");
        let category_id = $(this).attr("category-target");

        console.log("Category target: " + category_id);

        // Ajax request to APIs
        $.ajax({
            dataType: 'json',
            url: "/api/display/update",
            method: "post",
            data: {
                [category_id]: current_state
            },
            success: function (data) {
                console.log("Fetched data");

                // Check if there is data
                if(Object.keys(data).length > 0){
                    if(data.success){
                        // Operation done
                        $.notify(data.message, "success");
                    }
                    else{
                        // Error returned

                        // Check if array or string
                        if(Array.isArray(data.errors)){
                            // Group of errors

                            // Cycle every error detected
                            console.log("WIP");
                        }
                        else{
                            // Single error
                            $.notify(data.errors,"danger");
                        }
                    }
                }
                else{
                    $.notify("Le API non hanno fornito una risposta. Se il problema persiste contatta un amministratore", "warn");
                }

                // Log video data in terminal
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.error("Error while updating data");
                console.log(xhr);

                // Show error to screen
                $.notify("C'è stato un errore durante l'aggiornamento. Contatta un amministratore", "danger");

                // Reset checkbox status
                $(this).prop("checked", false);
            }
        });
    });


    // Setup timer
});