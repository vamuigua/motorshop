import "bootstrap-datepicker";

jQuery(function() {
    // datepicker to show Years only
    $("#datepicker").datepicker({
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years",
        minViewMode: "years"
    });
});
