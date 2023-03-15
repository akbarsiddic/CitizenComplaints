@extends('welcome')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Categories Table</h6>

                    @if (Auth::user()->role =='admin')
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add
                        Categories</button>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td class="text-xs font-weight-bold mb-0">{{ $category->name }}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{ $category->description }}</td>

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

{{-- add modal --}}
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="updateDataLabel" aria-hidden="true">
    <div class="modal-dialog" id="updateDialog">
        <div id="modal-content" class="modal-content">
            <div class="modal-body" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Complaint</h5>
                    <button type="button" class="btn btn-dark " data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>


                <div class="modal-body ">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Categories Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Categories Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Citizen Complaint</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection