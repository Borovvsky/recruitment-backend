@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('view.book-views.create-new-book') }}</h1>

                <form action="{{ route('books.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('view.book-views.title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        @foreach ($errors->get('title') as $titleError)
                            <div class="text-danger">{{ $titleError }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="author" class="form-label">{{ __('view.book-views.author') }}</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                        @foreach ($errors->get('author') as $authorError)
                            <div class="text-danger">{{ $authorError }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="year" class="form-label">{{ __('view.book-views.year') }}</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                        @foreach ($errors->get('year') as $yearError)
                            <div class="text-danger">{{ $yearError }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('view.book-views.description') }}</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        @foreach ($errors->get('description') as $descriptionError)
                            <div class="text-danger">{{ $descriptionError }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="available_copies" class="form-label">{{ __('view.book-views.available-copies') }}</label>
                        <input type="number" class="form-control" id="available_copies" name="available_copies" required>
                        @foreach ($errors->get('available_copies') as $availableCopiesError)
                            <div class="text-danger">{{ $availableCopiesError }}</div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="categories" class="form-label">{{ __('view.book-views.categories') }}</label>
                        <select multiple class="form-control" id="categories" name="categories[]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ __('view.book-views.create-book') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
