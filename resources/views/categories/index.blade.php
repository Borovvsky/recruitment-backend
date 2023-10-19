@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('view.category-views.categories-list') }}</h1>
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <a href="{{ route('categories.create') }}"
                       class="btn btn-primary">{{ __('view.category-views.add-category') }}</a>
                    <div>
                        <form action="{{ route('categories.index') }}" method="GET" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       placeholder="{{ __('view.category-views.search-category') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary"
                                            type="submit">{{ __('view.category-views.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success" role="alert" id="success-alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if($categories->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('view.category-views.name') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="action-column">
                                    <a href="{{ route('categories.show', $category->id) }}"
                                       class="btn btn-info">{{ __('view.category-views.view') }}</a>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="btn btn-warning">{{ __('view.category-views.edit') }}</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('{{ __('view.category-views.confirm').$category->name }}')">{{ __('view.category-views.delete') }}</button>
                                    </form>
                                    <a href="{{ route('books.category', $category->id) }}" class="btn btn-primary">{{ __('view.category-views.view-books') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links('pagination.custom') }}
                @else
                    <p>{{ __('view.category-views.no-categories') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
