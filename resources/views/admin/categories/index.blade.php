@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Category List
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right">Create</a>
            </h3>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->photo)
                                        <a href="{{ $category->photo->getUrl() }}" target="_blank">
                                            <img src="{{ $category->photo->getUrl() }}" width="90px" height="90px">
                                        </a>
                                    @else
                                        <span class="badge badge-warning">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $category->parent->name ?? 'Null' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <div>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <form onclick="return confirm('are you sure ?')"
                                                action="{{ route('admin.categories.destroy', $category->id) }}"
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
