<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/assets/admin/css/adminlte.css'])
    @vite(['resources/assets/admin/plugins/fontawesome-free/css/all.min.css'])
    @vite(['resources/assets/admin/plugins/jquery/jquery.min.js'])
    @vite(['resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'])
    @vite(['resources/assets/admin/js/adminlte.min.js'])
    @vite(['resources/assets/admin/js/demo.js'])
    @inertiaHead
    @routes
</head>
<body>
@inertia
@vite(['resources/js/app.js'])



</body>
</html>
