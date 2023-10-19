@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ __('view.category-views.create-new-category') }}</h1>
                <form>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">{{ __('view.category-views.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @foreach ($errors->get('name') as $nameError)
                            <div class="text-danger">{{ $nameError }}</div><br>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ __('view.category-views.create-category') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
