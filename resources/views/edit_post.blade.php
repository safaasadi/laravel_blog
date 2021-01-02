@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- Viewing their posts -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
            <form action="/update-post?id={{ $postEdit->id }}" method="POST">
            @csrf
                <div class="card-header">
                    <input class="w-100 form-control" name="title" type="text" value="{{ $postEdit->title }}" />
                </div>

                <div class="card-body">
                    <textarea class="w-100 form-control" name="body" value="{{ $postEdit->body }}">{{ $postEdit->body }}</textarea>
                </div>
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
                <br />
            </form>                

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
