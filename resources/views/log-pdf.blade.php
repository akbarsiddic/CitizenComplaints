<!DOCTYPE html>
<html>

<head>
    <title>Logs Report</title>

</head>

<body>

    <div>
        <h1>Logs Report</h1>
    </div>
    <div>
        <table border="1" style="width: 100%;table-layout:fixed;">
            <thead>
                <tr>

                    <th style="width:25%">Date</th>
                    <th style="width:25%">User</th>
                    <th style="width:25%">Title</th>
                    {{-- <th>Category</th> --}}
                    <th style="width:25%">Complaint Description</th>

                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>

                    <td style="width:5%; word-wrap: break-word">{{ date_create($log->created_at)->format('y-m-d') }}
                    </td>
                    <td style="width:5%; word-wrap: break-word">{{ $log->name }}</td>
                    <td style="width:45%; word-wrap: break-word">{{ $log->title }}</td>
                    <td style="width:45%; word-wrap: break-word">{{ $log->complaint_description }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>