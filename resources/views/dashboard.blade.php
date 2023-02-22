@extends('welcome')

@section('content')

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
                                    <td class="text-xs  font-weight-bold mb-0">{{$item->status}}</td>

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