@extends('welcome')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Complaints Table</h6>
                </div>
                <div class="card-header pb-0">

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add
                        Complaint</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 ">
                            <thead>

                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    {{-- <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description</th> --}}
                                    {{-- <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th> --}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created At</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">


                                </tr>

                            </thead>
                            <tbody>
                                @foreach($complaints as $complaint)
                                <tr>

                                    <td class="text-xs font-weight-bold mb-0">{{ $complaint->title }}</td>

                                    {{-- <td class="text-xs font-weight-bold mb-0">{{ $complaint->description }}</td>
                                    --}}
                                    {{-- <td class="text-xs font-weight-bold mb-0">{{ $complaint->status }}</td> --}}
                                    <td class="text-xs font-weight-bold mb-0">{{ $complaint->category_name }}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{ $complaint->created_at }}</td>

                                    <td class="text-xs font-weight-bold mb-0"><button
                                            class="btn btn-primary description-btn"
                                            data-description="{{ $complaint->description }}"
                                            data-status="{{ $complaint->status }}" data-bs-toggle="modal"
                                            data-bs-target="#desModal">Description</button></td>
                                    {{-- @if (Auth::user()->role == 'admin') --}}
                                    <td class="text-xs font-weight-bold mb-0"><button
                                            class="btn btn-success description-btn" data-id="{{ $complaint->id }}"
                                            data-title="{{ $complaint->title }}"
                                            data-category_id="{{ $complaint->category_id }}"
                                            data-description="{{ $complaint->description }}"
                                            data-status="{{ $complaint->status }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">Edit</button></td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        <form action="{{ route('complaint.destroy', $complaint->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger description-btn">Delete</button>
                                        </form>
                                    </td>
                                    {{-- @endif --}}
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


{{-- description modal --}}
<div class="modal fade" id="desModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="updateDataLabel" aria-hidden="true">
    <div class="modal-dialog" id="updateDialog">
        <div id="modal-content" class="modal-content">
            <div class="modal-body" id="modal-content">
                Loading..
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
                            <textarea class="form-control" id="description" name="description" rows="5"
                                required></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>akbarsiddiq</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- edit modal --}}
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="updateDataLabel" aria-hidden="true">
    <div class="modal-dialog" id="updateDialog">
        <div id="modal-edit" class="modal-content">
            <div class="modal-body" id="modal-edit">
                Loading..
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
{{-- script description --}}
<script>
    $('#desModal').on('shown.bs.modal', function(e) {
        var status = $(e.relatedTarget).data('status');
        var statusClass = "bg-secondary";
        if (status === "pending") {
        statusClass = "bg-danger";
        } else if (status === "in progress") {
        statusClass = "bg-primary";
        } else if (status === "closed") {
        statusClass = "bg-success";
        }
            var html = `
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Complaint Description</h5>
                        <button type="button" class="btn btn-dark " data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body ">
                        ${$(e.relatedTarget).data('description')}
                    </div>
                    <div class="modal-footer">
                        <span class="badge ${statusClass}">${status}</span>
                    </div>
                </div>
                </div>
                </div>
            `;

            $('#modal-content').html(html);


            

        });

        
</script>
{{-- script edit --}}
<script>
    $('#editModal').on('shown.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var category_id = $(e.relatedTarget).data('category_id');
        var description = $(e.relatedTarget).data('description');
        var status = $(e.relatedTarget).data('status');

var html = `
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Complaint</h5>
            <button type="button" class="btn btn-dark " data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
            <form action="{{ route('complaint.update', ['id' => $complaint->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="${id}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="${title}" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Complaint Categories</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Select categories...</option>
                        <option value="1" ${category_id==1 ? 'selected' : '' }>Environtmental / Lingkungan</option>
                        <option value="2" ${category_id==2 ? 'selected' : '' }>Traffic / Lalu Lintas</option>
                        <option value="3" ${category_id==3 ? 'selected' : '' }>Public Safety / Keamanan Publik</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Complaint Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        required>${description}</textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="">Select Option...</option>
                        <option value="pending" ${status=='pending' ? 'selected' : '' }>Pending</option>
                        <option value="in progress" ${status=='in progress' ? 'selected' : '' }>In Progress</option>
                        <option value="closed" ${status=='closed' ? 'selected' : '' }>Closed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <p>akbarsiddiq</p>
        </div>
     </div>                   
`;

$('#modal-edit').html(html);




});
</script>
<script>
    $(function() {
        $('#complaint-form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    $('#complaint-modal').modal('hide');
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
@endsection