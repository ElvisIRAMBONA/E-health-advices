<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Welcome to the Dashboard</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <p>Total Users: 100</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        <p>Total Posts: 250</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Comments</div>
                    <div class="card-body">
                        <p>Total Comments: 500</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>