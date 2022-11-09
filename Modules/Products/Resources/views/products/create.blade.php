@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if ($errors->count() > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" required id="name" class="form-control"
                        value="{{ old('name') }}">
                </div>

                <div class="form-group col-6 ">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="tags">Tags <small>(comma separated words)</small></label>
                    <input type="text" name="tags" required id="tags" class="form-control"
                        value="{{ old('tags') }}">
                </div>
                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <input type="text" name="description" required id="description" class="form-control"
                        value="{{ old('description') }}">
                </div>
                <div class="form-group col-6">
                    <label for="picture">Picture</label>
                    <input type="file" name="picture" required id="picture" class="form-control"
                        value="{{ old('picture') }}">
                </div>
            </div>
    </div>

    <div class="row my-3">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
    </div>


    @push('scripts')
    @endpush
@endsection
