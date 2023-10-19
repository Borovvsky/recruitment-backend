@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('view.book-views.books-in-category') }} {{ $category->name }}</h1>

                @if($books->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('view.book-views.title') }}</th>
                            <th>{{ __('view.book-views.author') }}</th>
                            <th>{{ __('view.book-views.year') }}</th>
                            <th>{{ __('view.book-views.description') }}</th>
                            <th>{{ __('view.book-views.available-copies') }}</th>
                            <th>{{ __('view.book-views.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->available_copies }}</td>
                                <td class="action-column">
                                    <a href="{{ route('books.show', $book->id) }}"
                                       class="btn btn-info">{{ __('view.book-views.view') }}</a>
                                    <a href="{{ route('books.edit', $book->id) }}"
                                       class="btn btn-warning">{{ __('view.book-views.edit') }}</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('{{ __('view.book-views.confirm').$book->title }}')">{{ __('view.book-views.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $books->links('pagination.custom') }}
                @else
                    <p>{{ __('view.book-views.no-books') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
