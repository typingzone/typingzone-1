<div class="card-body">
    <div class="table-responsive dataview">
        <table class="table datanew table-sm table-hover" id="dashboard-expired-documents">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Document Name</th>
                    <th>Expiry Date</th>
                    <th class="no-sort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expiringDocuments as $document)
                <tr data-row-id="{{ $document->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $document->documentName->document_name }}</td>
                    <td><span class="badge badge-linesuccess">{{ $document->expiry_date }}</span></td> 
                    <td class="action-table-data">
                        <div class="edit-delete-action d-flex justify-content-start">
                            <a class="me-2 p-2" href="javascript:void(0);" data-id="{{ $document->id }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="me-2 p-2" href="{{ route('documents.download', $document->id) }}">
                                <i class="fa fa-download"></i>
                            </a>
                            <a class="me-2 p-2 delete-document" href="javascript:void(0);" data-id="{{ $document->id }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    
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
</script>