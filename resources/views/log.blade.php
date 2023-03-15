@extends('welcome')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>History</h6>
                    <div class="d-flex align-items-center">
                        <form method="GET" action="{{ route('logs.index') }}" class="form-inline">
                            <div class="form-group mr-3">
                                <input type="text" class="form-control" placeholder="Search" name="search"
                                    value="{{ old('search') }}">
                            </div>
                            <div class="form-group mr-3">
                                <select name="status" class="form-control form-select">
                                    <option value="">All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="in progress">In Progress</option>
                                    <option value="resolved">Resolved</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-secondary mr-3" type="submit">Search</button>
                            @if(count($logs) > 0)
                            <a href="{{ route('logs.export', ['search' => old('search'), 'status' => old('status')]) }}"
                                target="_blank" class="btn btn-danger align-item-end">Export to PDF</a>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td class="text-xs font-weight-bold">{{ $log->name }}</td>
                                    <td class="text-xs font-weight-bold">{{ $log->title }}</td>
                                    <td class="text-xs font-weight-bold">{{ $log->category }}</td>
                                    <td class="text-xs font-weight-bold">{{ $log->status }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection