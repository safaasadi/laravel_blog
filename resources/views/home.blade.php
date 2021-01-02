@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- Viewing their posts -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Posts</div>

                <div class="card-body">

                @foreach(\App\Post::where('author_id', auth()->user()->id)->get() as $post)
                    <div class="row">
                        <div class="col-10">
                            <a href="/post?id={{ $post->id }}">{{ $post->title }}</a>
                        </div>
                        <div class="col-1">
                            <a href="/edit-post?id={{ $post->id }}" class="btn btn-sm btn-primary"><ion-icon name="create-outline"></ion-icon></a>
                        </div>
                        <div class="col-1">
                            <form action="/delete-post?id={{ $post->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </div>
                    </div>
                    <hr />
                    <br />
                @endforeach

                </div>
            </div>
        </div>
    </div>

    <br />
    <br />

    <!-- Creating a post -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a post</div>

                <div class="card-body">
                    <form action="/create-post" method="POST">
                    @csrf
                        <div class="col-12">
                            <input class="w-100 form-control" name="title" type="text" placeholder="Title..." autocomplete="off" />
                        </div>
                        <br />
                        <div class="col-12">
                            <textarea class="w-100 form-control" name="body" placeholder="Write some dope stuff..."></textarea>
                        </div>
                        <br />
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    @if(Session::has('alert'))
    <script type="text/javascript">
        Swal.fire({
            title: 'Success!',
            text: "{{ Session::get('alert') }}",
            icon: 'success',
            confirmButtonText: 'Thanks!'
            })
    </script>
    @endif

    
@endsection
