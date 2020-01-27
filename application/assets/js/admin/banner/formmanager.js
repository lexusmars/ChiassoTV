// Add listener to start date picker
$('#start_date').on('change', function (ev) {
    let start_date = $(this).val();

    // Read subscription days
    let days = $("#subscriptionType").children("option:selected").attr("days");

    // Calculate end date
    let end_date = moment(start_date).add(days, "days").format("YYYY-MM-DD");

    // Setup end date
    $("#end_date").val(end_date);
});


// Add listener to subscription select
$('#subscriptionType').on("change", function(ev){
    // Update end_date (if set)
    $("#start_date").trigger("change");
});

