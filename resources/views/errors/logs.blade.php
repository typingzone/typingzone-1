<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Logs</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #2c3e50; margin: 0; padding: 20px; color: #ecf0f1; }
        .log-container { background-color: #34495e; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        pre { white-space: pre-wrap; word-wrap: break-word; font-size: 14px; color: #ecf0f1; background-color: #2c3e50; padding: 15px; border-radius: 8px; }
        h1 { font-size: 24px; margin-bottom: 20px; color: #ecf0f1; }
        button { padding: 10px 15px; background-color: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #c0392b; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="log-container">
        <h1>Laravel Log File</h1>
        <button id="clear-log">Clear Logs</button>
        <pre id="log-content">{{ $logs }}</pre>
    </div>

    <script>
        $('#clear-log').click(function() {
            $.ajax({
                url: '{{ route("clear-logs") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#log-content').text('Log file cleared.');
                },
                error: function() {
                    alert('Failed to clear the logs.');
                }
            });
        });
    </script>
</body>
</html>
