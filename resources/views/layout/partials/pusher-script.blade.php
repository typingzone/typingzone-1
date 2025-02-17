<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('4f329c33c16811113829', {
        cluster: 'ap2'
    });
    var transactionChannel = pusher.subscribe('new-transaction-channel');
    transactionChannel.bind('transaction-added', function(data) {
        toastr.success(data.message);
    });
    var statusChannel = pusher.subscribe('transaction-status-channel');
    statusChannel.bind('status-updated', function(data) {
        toastr.info(data.message);
    });
</script>