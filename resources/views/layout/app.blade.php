<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("favicon.png") }}">
    <link rel="icon" type="image/png" href="{{ asset("favicon.png") }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SpeedCubing</title>
    @vite('resources/css/app.css')
    @yield("css")
</head>
<body>
@yield("app")
@yield("scripts")
</body>
</html>
