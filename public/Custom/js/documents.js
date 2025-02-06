$(document).ready(function() {
    $('.mySelect2').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-document-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/document-names" class="mt-2 btn btn-primary btn-sm form-control">Add Document Name</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });
});


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

