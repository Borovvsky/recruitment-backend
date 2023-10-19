@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success" role="alert" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h1>{{ __('view.book-views.title-show') }}{{ $book->title }}</h1>

                <p>{{ __('view.book-views.author-show') }} {{ $book->author }}</p>
                <p>{{ __('view.book-views.year-show') }} {{ $book->year }}</p>
                <p>{{ __('view.book-views.description-show') }} {{ $book->description }}</p>
                <p>{{ __('view.book-views.available-copies-show') }} {{ $book->available_copies }}</p>
                <p>
                    @if($book->categories->isNotEmpty())
                        {{ __('view.book-views.categories-show') }}
                        @foreach ($book->categories as $category)
                            <a href="{{ route('books.category', $category->id) }}">{{ $category->name }}</a>{{ $loop->last ? '' : ',' }}
                        @endforeach
                    @else
                        {{ __('view.book-views.no-category') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
