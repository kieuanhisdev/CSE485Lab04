<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color:rgb(255, 255, 255);
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            border-right: 1px solid #ddd;
            padding: 2rem 1rem;
            color: #ffffff;
        }
        .content {
            flex: 1;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-left: 1rem;
        }
        .sidebar h5 {
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #ffffff;
        }
        .sidebar a {
            text-decoration: none;
            color: #ffffff;
            display: block;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5>Navigation</h5>
        <a href="{{ route('readers.index') }}">Readers</a>
        <a href="{{ route('books.index') }}">Books</a>

    </div>
    <div class="container mt-4">
        @yield('content')
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
