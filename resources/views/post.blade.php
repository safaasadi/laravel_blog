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

