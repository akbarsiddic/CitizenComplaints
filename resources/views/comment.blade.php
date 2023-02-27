@extends ('welcome')

@section('content')


<div class="container-fluid py-4">
    @foreach ($comment as $item)

    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">{{$item->user->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at}}</h6>
            <p class="card-text">{{$item->comment}}
            </p>
            <p class="card-title">{{$item->user->role}}</p>
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
@endsection