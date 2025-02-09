@include('emails.partials.header')
<body>
    <div class="email-container">
        <div class="email-body">
            <p>Hello {{ $userName }},</p>
            <p>The following notes you have are due today:</p>
            <table style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Note Title</th>
                        <th style="border: 1px solid #000; padding: 8px; text-align: left;">Reminder Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notes as $note)
                        <tr>
                            <td style="border: 1px solid #000; padding: 8px;">{{ $note->title }}</td>
                            <td style="border: 1px solid #000; padding: 8px;">{{ $note->reminder_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Please take necessary actions to address the notes.</p>
        </div>
       
    </div>
</body>
@include('emails.partials.footer')

