jQuery(function() {
    $("#datatable").DataTable({
        responsive: true,
        fixedHeader: true,
        dom: "Bfrtip",
        buttons: ["pdf", "print", "colvis"]
    });
});
