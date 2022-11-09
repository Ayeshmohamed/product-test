@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form  action="{{ route('categories.update',['id' => $category->id]) }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" required id="name" class="form-control" value="{{ old('name',$category->name) }}">
                </div>
                <div class="form-group col-6 ">
                    <label for="parent">Parent</label>
                    <select name="parent_id" id="parent" class="form-control">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id}}" {{ $cat->id == $category->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="is_active">Activation</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" {{ $category->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0">Un Active</option>
                    </select>
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
