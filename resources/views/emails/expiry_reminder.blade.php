@include('emails.partials.header')
<body>
    <h1>Document Expiry Reminder</h1>
    <p>The following documents are nearing their expiry:</p>
    <table>
        <thead>
            <tr>
                <th>Document Title</th>
                <th>Entity Type</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->document_title }}</td>
                    <td>{{ $document->entity_type }}</td>
                    <td>{{ $document->expiry_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Please take necessary actions to renew or archive the documents.</p>
</body>
@include('emails.partials.footer')