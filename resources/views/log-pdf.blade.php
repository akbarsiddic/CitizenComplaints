<!DOCTYPE html>
<html>

<head>
    <title>Logs Report</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="text-center">
        <h1>Logs Report</h1>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Complaint Description</th>

                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->name }}</td>
                    <td>{{ $log->title }}</td>
                    <td>{{ $log->category }}</td>
                    <td>{{ $log->complaint_description }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>