var pdfMake = require("pdfmake");
var pdfFonts = require("pdfmake/build/vfs_fonts.js");
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = require("jszip/dist/jszip");
require("datatables.net-bs4");
require("datatables.net-buttons-bs4");
require("datatables.net-buttons/js/buttons.colVis.js")();
require("datatables.net-buttons/js/buttons.html5.js")();
require("datatables.net-buttons/js/buttons.print.js")();
require("datatables.net-fixedheader-bs4");
require("datatables.net-responsive-bs4");

jQuery(function() {
    $("#datatable").DataTable({
        responsive: true,
        fixedHeader: true,
        dom: "Bfrtip",
        lengthMenu: [
            [10, 25, 50, -1],
            ["10 rows", "25 rows", "50 rows", "Show all"]
        ],
        buttons: [
            {
                extend: "pdf",
                text:
                    '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"> Export to PDF</i>'
            },
            {
                extend: "csv",
                text: '<i class="fas fa-file-csv fa-1x"> Export to CSV</i>',
                exportOptions: {
                    modifier: {
                        page: "current"
                    }
                }
            },
            {
                extend: "excel",
                text: '<i class="fas fa-file-excel fa-1x"> Export to excel</i>',
                exportOptions: {
                    modifier: {
                        page: "current"
                    }
                }
            },
            {
                extend: "print",
                text: '<i class="fas fa-print fa-1x"> Print current page</i>',
                exportOptions: {
                    modifier: {
                        page: "current"
                    }
                }
            },
            "pageLength"
        ]
    });
});
