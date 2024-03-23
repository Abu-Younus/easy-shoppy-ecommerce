<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact Mail</title>
    </head>
    <body>
        <h4>Hi, {{ $admin->name }}</h4>
        <h5 style="color: darkgrey">New contact message here...</h5>
        <hr />
        <h6 style="color: darkcyan">Contact Mail Info</h6>
        <hr/>
        <span style="color: darkslategray">Name: {{ $contact->name }}</span>
        <span style="color: darkslategray">Email: {{ $contact->email }}</span>
        <span style="color: darkslategray">Phone: {{ $contact->phone }}</span>
        <p style="color: darkslategray">Comment: {{ $contact->comment }}</p>
        <hr/>
    </body>
</html>
