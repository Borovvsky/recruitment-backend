@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('view.book-views.edit-book') }}</h1>

                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">{{ __('view.book-views.title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        @foreach ($errors->get('title') as $titleError)
                            <div class="text-danger">{{ $titleError }}</div><br>
                        @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="author" class="form-label">{{ __('view.book-views.author') }}</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                        @foreach ($errors->get('author') as $authorError)
                            <div class="text-danger">{{ $authorError }}</div><br>
                        @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="year" class="form-label">{{ __('view.book-views.year') }}</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
                        @foreach ($errors->get('year') as $yearError)
                            <div class="text-danger">{{ $yearError }}</div><br>
                        @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">{{ __('view.book-views.description') }}</label>
                        <textarea class="form-control" id="description" name="description" rows="4"
                                  required>{{ $book->description }}</textarea>
                        @foreach ($errors->get('description') as $descriptionError)
                            <div class="text-danger">{{ $descriptionError }}</div><br>
                        @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="available_copies" class="form-label">{{ __('view.book-views.available-copies') }}</label>
                        <input type="number" class="form-control" id="available_copies" name="available_copies"
                               value="{{ $book->available_copies }}" required>
                        @foreach ($errors->get('available_copies') as $availableCopiesError)
                            <div class="text-danger">{{ $availableCopiesError }}</div><br>
                        @endforeach
                    </div>
                    <div class="form-group mb-3">
                        <label for="categories" class="form-label">{{ __('view.book-views.categories') }}</label>
                        <select multiple class="form-control" id="categories" name="categories[]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if(in_array($category->id, $book->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ __('view.book-views.update-book') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
