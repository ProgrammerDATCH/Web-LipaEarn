<!DOCTYPE html>
<html>
<head>
    <title>Screenshot Email</title>
</head>
<body>
    <h1>Screenshot Email</h1>
    <p>{{ $data['message'] }}</p>

    <p>Attached is the screenshot:</p>
    <img src="{{ $message->embed(public_path('storage/' . $screenshotPath)) }}" alt="Screenshot">

    <p>Thank you!</p>
</body>
</html>
