<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>{{ env("APP_NAME") }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" /> <!-- ========== Start livewire styles ========== -->
    @livewireStyles
    <!-- ========== End livewire styles ========== -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    @livewire('sidebar')
</body>

</html>
