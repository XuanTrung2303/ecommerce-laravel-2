@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Product List
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">Create</a>
            </h3>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @foreach ($product->tags as $tag)
                                        <span class="badge badge-warning">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if ($product->gallery)
                                        <a href="{{ $product->gallery->first()->getUrl() }}" target="_blank">
                                            <img src="{{ $product->gallery->first()->getUrl() }}" width="90px"
                                                height="90px">
                                        </a>
                                    @else
                                        <span class="badge badge-warning">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <div>
                                            <a href="{{ route('admin.products.show', $product->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <form onclick="return confirm('are you sure ?')"
                                                action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
