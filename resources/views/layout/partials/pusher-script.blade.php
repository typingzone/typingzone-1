<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('4f329c33c16811113829', {
        cluster: 'ap2'
    });
    var transactionChannel = pusher.subscribe('new-transaction-channel');
    transactionChannel.bind('transaction-added', function(data) {
        toastr.success(data.message);
        addTransactionRow(data.transaction);
    });
    var statusChannel = pusher.subscribe('transaction-status-channel');
    statusChannel.bind('status-updated', function(data) {
        toastr.info(data.message);
    });

    function addTransactionRow(transaction) {
        var table = $('#transaction-table').DataTable();
        var createdAt = new Date(transaction.created_at).toISOString().split('T')[0];

        var newRow = [
            table.rows().count() + 1,
            transaction.order.customer_name || 'N/A',
            transaction.service.service_name + (transaction.description ? '<i class="fa fa-info-circle text-info" data-bs-toggle="tooltip" title="' + transaction.description + '"></i>' : ''),
            '<i class="fa ' + getStatusIcon(transaction.status) + ' status-icon" data-id="' + transaction.id + '" data-status="' + transaction.status + '" data-bs-toggle="tooltip" title="' + capitalizeFirstLetter(transaction.status) + '" style="cursor: pointer; margin-right: 4px"></i>' + transaction.application_no,
            transaction.govt_cost,
            transaction.service_cost,
            transaction.total_cost,
            '<span class="badge badge-info custom-badge">' + transaction.paid_by + '</span>',
            '<span class="badge badge-success custom-badge">' + transaction.pay_status + '</span>',
            '<span class="badge badge-dark custom-badge">' + transaction.user.name + '</span>',
            createdAt,
            '<div class="edit-delete-action"><a class="me-2 p-2" href="/transaction/receipt/' + transaction.id + '"><i class="fa fa-download"></i></a><a class="me-2 edit-transaction p-2" href="javascript:void(0);" data-id="' + transaction.id + '"><i class="fa fa-edit"></i></a><a class="p-2 delete-transaction" href="javascript:void(0);" data-id="' + transaction.id + '"><i class="fa fa-trash"></i></a></div>'
        ];

        table.row.add(newRow).draw(false);
        table.order([0, 'desc']).draw(false);
        
        table.rows().every(function(rowIdx) {
            table.cell(rowIdx, 0).data(rowIdx + 1);
        });
        table.draw(false);
        
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    function getStatusIcon(status) {
        if (status === 'approved') return 'fa-check-circle text-success';
        if (status === 'rejected') return 'fa-times-circle text-danger';
        if (status === 'pending') return 'fa-clock text-warning';
        return '';
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>
