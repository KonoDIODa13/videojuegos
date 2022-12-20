// Basic example
$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        'paging': true,
        "pagingType": "simple_numbers" // "simple" option for 'Previous' and 'Next' buttons only
    });
    $('.dataTables_length').addClass('bs-select');
});