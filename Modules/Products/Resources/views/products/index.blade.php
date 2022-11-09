@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <a class="btn btn-success my-3" href="{{ route('products.create') }}">Create +</a>
        <table id="products" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>tags</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ? $product->category->name : '' }}</td>
                        <td>{{ $product->tags }}</td>
                        <td>@if($product->picture)
                            <img width="100" src='{{ asset('storage/'.$product->picture) }}'>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning mb-2" href="{{ route('products.edit',['id' => $product->id]) }}">Edit</a>
                            <form action="{{ route('products.delete',['id' => $product->id]) }}" method="Post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $product->id }}">
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
                $('#products').DataTable();
            });
        </script>
    @endpush
@endsection
