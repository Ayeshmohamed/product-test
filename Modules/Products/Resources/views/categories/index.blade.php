@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <a class="btn btn-success my-3" href="{{ route('categories.create') }}">Create +</a>
        <table id="categories" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                        <td>{{ $category->is_active ? 'Active' : 'UnActive' }}</td>
                        <td>
                            <a class="btn btn-warning mb-2" href="{{ route('categories.edit',['id' => $category->id]) }}">Edit</a>
                            <form action="{{ route('categories.delete',['id' => $category->id]) }}" method="Post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <button class="btn btn-danger" type="submit" >Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#categories').DataTable();
            });
        </script>
    @endpush
@endsection
