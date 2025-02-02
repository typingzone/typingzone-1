$(document).ready(function () {
    $('#uploadButton').click(function() {
        var formData = new FormData();
        formData.append('document_name_id', $('#documentName').val());
        formData.append('expiry_date', $('#expiryDate').val());
        formData.append('file', $('#fileInput')[0].files[0]);

        $.ajax({
            url: uploadDocumentUrl, // Use the global variable declared in Blade
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                        $('#progressBar').css('width', percentComplete + '%');
                        $('#uploadPercentage').text(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (response) {
                toastr.success('Document uploaded successfully');
                $('#progressBar').css('width', '0%');
                $('#uploadPercentage').text('0%');
                $('#add-document-modal').modal('hide');
                location.reload();
            },
            error: function (error) {
                toastr.error('Error uploading document');
                $('#progressBar').css('width', '0%');
                $('#uploadPercentage').text('0%');
            }
        });
    });
});



$(document).ready(function () {
    $(document).on('click', '.delete-document', function () {
        var documentId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to undo this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/documents/' + documentId, 
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            $('tr[data-row-id="' + documentId + '"]').remove();
                            toastr.success('Document deleted successfully');
                        } else {
                            toastr.error('Failed to delete document');
                        }
                    },
                    error: function (error) {
                        toastr.error('Failed to delete document');
                    }
                });
            }
        });
    });
});

