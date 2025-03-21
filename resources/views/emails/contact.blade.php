<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>
    <p><strong>Name:</strong> {{ $content['name'] }}</p>
    <p><strong>Email:</strong> {{ $content['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $content['message'] }}</p>
</body>
</html>
