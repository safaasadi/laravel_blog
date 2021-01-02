@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- Viewing their posts -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ $post->title }}
                </div>

                <div class="card-body">
                {{ $post->body }}
                
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
