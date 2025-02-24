@include('emails.partials.header')
<<<<<<< HEAD
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
=======

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
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
