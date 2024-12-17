<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord admin</title>
    <!-- Lien vers vos fichiers CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <header class="d-flex justify-content-between align-items-center bg-dark text-white p-3">
            <h1>Admin Dashboard</h1>
            <nav>
                <a href="{{ route('admin.categories.index') }}" class="text-white mx-2">categories</a>
                <a href="{{ route('admin.products.index') }}" class="text-white mx-2">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="text-white mx-2">Orders</a>
                <a href="{{ route('admin.doctors.index') }}" class="text-white mx-2">Doctors</a>
                <a href="{{ route('admin.allApointments') }}" class=" text-white mx-2">Appointments</a>
                <a href="{{ route('admin.schedules.index') }}" class="text-white mx-2">Schedules</a>
                <a href="#" class="text-white mx-2">Users</a>
                <a href="{{ route('logout') }}" class="text-white mx-2">Logout</a>
            </nav>
        </header>

        <div class="row">
            <div class="col-12">
                <!-- Contenu spécifique à chaque page -->
                @yield('content')
            </div>
        </div>

        <footer class="bg-dark text-white text-center p-3">
            &copy; 2024 MonSite - Tous droits réservés
        </footer>
    </div>

    <!-- Lien vers les scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>