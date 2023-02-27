@extends ('welcome')

@section('content')



<div class="container-fluid py-4">
    @foreach ($comment as $item)

    <div class="card bg-gradient-primary shadow mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-white mb-0">{{$item->user->name}}</h5>
                <small class="text-white">{{$item->created_at}}</small>
            </div>
            <hr class="my-2">
            <p class="text-white">{{$item->comment}}</p>
            <p class="text-white mb-0">{{$item->user->role}}</p>
        </div>
    </div>
    <br>
    @endforeach
    <br>
    <div class="card p-5 ">

        <div class="card-header">
            <h5>Write New Comment</h5>
        </div>
        <div class="mb-3">
            <form action="{{route('comment.store',['id'=>$id])}}" method="POST">
                @csrf
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@if(session('toast_success'))
<script>
    Swal.fire({
            icon: 'success',
            title: '{{ session('toast_success') }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
</script>
@endif


@endsection