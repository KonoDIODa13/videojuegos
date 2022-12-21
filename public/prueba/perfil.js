// Basic example
$(document).ready(function () {
    $('#tabla').DataTable({
        pagingType: 'full_numbers',
        "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
    });
    //$('.dataTables_length').addClass('bs-select');
});