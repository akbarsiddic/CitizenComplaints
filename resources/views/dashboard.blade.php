@extends('welcome')

@section('content')

@if (Auth::user()->role == 'user')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header">
            Write Your Complaint
        </div>
        <div class="card-body">
            <form action="{{ route('complaint.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Complaint Categories</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Select categories...</option>
                        <option value="1">Environtmental / Lingkungan</option>
                        <option value="2">Traffic / Lalu Lintas</option>
                        <option value="3">Public Safety / Keamanan Publik</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Complaint Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="card-footer text-end">akbarsiddiq</div>
        </div>
    </div>
</div>
@endif

@if (Auth::user()->role == 'user')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Your Complaint</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Complaint::where(['user_id'=>Auth::id()])->get() as $key => $item)
                                <tr>

                                    <td class="text-xs font-weight-bold mb-0">{{$item->title}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->category->name}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->created_at}}</td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        @if ($item->status == 'pending')
                                        <span class="badge bg-danger mx-o">{{$item->status}}</span>
                                        @elseif ($item->status == 'in progress')
                                        <span class="badge bg-primary">{{$item->status}}</span>
                                        @elseif ($item->status == 'closed')
                                        <span class="badge bg-success">{{$item->status}}</span>
                                        @else
                                        <span class="badge bg-secondary">{{$item->status}}</span>
                                        @endif
                                    </td>

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
@endif

@if(Auth::user()->role == 'petugas')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Pending Complaint</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Complaint::where(['status'=>'pending'])->get() as $key => $item)
                                <tr>

                                    <td class="text-xs font-weight-bold mb-0">{{$item->title}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->category->name}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->created_at}}</td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        @if ($item->status == 'pending')
                                        <span class="badge bg-danger mx-o">{{$item->status}}</span>
                                        @endif
                                    </td>

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

@endif

{{-- @if(Auth::user()->role == 'admin')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Pending Complaint</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse (App\Models\Complaint::where(['status'=>'pending'])->get() as $key => $item)
                                <tr>

                                    <td class="text-xs font-weight-bold mb-0">{{$item->title}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->category->name}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->created_at}}</td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        @if ($item->status == 'pending')
                                        <span class="badge bg-danger mx-o">{{$item->status}}</span>
                                        @endif
                                    </td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif --}}

@if(Auth::user()->role == 'admin')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>All Complaint</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Complaint::get() as $key => $item)
                                <tr>

                                    <td class="text-xs font-weight-bold mb-0">{{$item->title}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->category->name}}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{$item->created_at}}</td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        @if ($item->status == 'pending')
                                        <span class="badge bg-danger mx-o">{{$item->status}}</span>
                                        @elseif ($item->status == 'in progress')
                                        <span class="badge bg-primary">{{$item->status}}</span>
                                        @elseif ($item->status == 'closed')
                                        <span class="badge bg-success">{{$item->status}}</span>
                                        @else
                                        <span class="badge bg-secondary">{{$item->status}}</span>
                                        @endif
                                    </td>

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

@endif


@endsection