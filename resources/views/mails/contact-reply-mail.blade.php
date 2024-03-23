<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact Message Reply Mail</title>
    </head>
    <body>
        <h4>Hi, {{ $contact->name }}</h4>
        <h5 style="color: darkgrey">Your contact message reply here...</h5>
        <hr />
        <h6 style="color: darkcyan">Your Message</h6>
        <hr/>
        <span style="color: darkslategray">Name: {{ $contact->name }}</span>
        <span style="color: darkslategray">Email: {{ $contact->email }}</span>
        <span style="color: darkslategray">Phone: {{ $contact->phone }}</span>
        <p style="color: darkslategray">Comment: {{ $contact->comment }}</p>
        <hr/>
        <p style="color: darkslategray">Reply Message: {{ $contactReply->reply_message }}</p>
        <hr/>
    </body>
</html>
