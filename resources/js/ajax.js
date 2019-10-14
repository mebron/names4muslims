$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', 'a.jquery-postback', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        swal("Deleted!", "Your image file has been deleted.", "success");
        location.reload();
    });
});