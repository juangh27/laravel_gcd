$(document).ready(function() {
    console.log("test");
    new DataTable('#tabla', {
        "lengthMenu": [10, 25, 50, 100], // Set the available options for the number of entries
        "pageLength": 25,
        "buttons": [
            'excelHtml5', // Excel export button
            'csvHtml5', // CSV export button
            'pdfHtml5' // PDF export button
        ],
        "dom": 'Bfrtip',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json',
        },
        "ajax": "/get_data",
        "columns": [
            { "data": "PRODUCT_ID" },
            { "data": "CORP" },
            { "data": "PRODUCT_NAME" },
            { "data": "DESCRIPTION" },
            { "data": "CATEGORY" },
            { "data": "AVAILABLE" },
            // Add more columns as needed
        ]
    });
});