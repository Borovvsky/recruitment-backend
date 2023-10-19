@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1>{{ __('view.category-views.category-name') }} {{ $category->name }}</h1>
    </div>
@endsection
