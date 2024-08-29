@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Category Product List</div>
            <div class="card-body">
                <a href="{{ route('category_product.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Category Product</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($categoryProducts as $categoryProduct)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $categoryProduct->code }}</td>
                            <td>{{ $categoryProduct->name }}</td>
                            <td>{{ $categoryProduct->quantity }}</td>
                            <td>{{ $categoryProduct->price }}</td>
                            <td>
                                <form action="{{ route('category_product.destroy', $categoryProduct->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('category_product.show', $categoryProduct->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('category_product.edit', $categoryProduct->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this category product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Category Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $categoryProducts->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
