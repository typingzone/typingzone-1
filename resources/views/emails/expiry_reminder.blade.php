@include('emails.partials.header')

<body>    
    <p>Hello {{ $userName }},</p>

    <p>The following document(s) you added are nearing their expiry:</p>
    
    @foreach($documents as $document)
        @if($document->user_id == $user->id)
            <h3>{{ $document->documentName->document_name }}</h3>
            <table style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Document</th>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000; padding: 8px;">{{ $document->documentName->document_name }}</td>
                        <td style="border: 1px solid #000; padding: 8px;">{{ $document->expiry_date }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endforeach
    
    <p>Please take necessary actions to renew or archive the documents.</p>
</body>

@include('emails.partials.footer')
