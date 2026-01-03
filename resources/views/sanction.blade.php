<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Total Sanctions: {{ $sanctionCount }}</p>
    
    @foreach($sanctions as $sanction)
    <p>ID: {{ $sanction->id }} | Name: {{ $sanction->sanction_name }}</p>
    @endforeach

</body>

</html>