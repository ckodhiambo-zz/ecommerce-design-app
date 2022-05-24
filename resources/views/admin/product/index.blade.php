@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $products as $item )
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->category_id }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>
                            {{ $item->selling_price }}
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="category-image"
                                 alt="Image here" style="width: 100%">
                        </td>
                        <td>
                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
