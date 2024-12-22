$(document).ready(function () {
    $('#search').on('keyup', function () {
        const query = $(this).val(); // Capture input
        const url = $(this).data('url'); // Get the URL from the data attribute

        $.ajax({
            url: url,
            type: 'GET',
            data: { search: query }, // Pass the search query to the server
            success: function (data) {
                $('#table-container').html(data); // Update the job table
            },
            error: function () {
                alert('Something went wrong!'); // Error handling
            },
        });
    });
});
