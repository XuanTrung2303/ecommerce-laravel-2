@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Product
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary float-right">Go Back</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $id => $categoryName)
                            <option {{ $id === $product->category_id ? 'selected' : null }} value="{{ $id }}">
                                {{ $categoryName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" class="form-control" multiple>
                        @foreach ($tags as $id => $tagName)
                            <option {{ in_array($id, $product->tags->pluck('id')->toArray()) ? 'selected' : null }}
                                value="{{ $id }}">
                                {{ $tagName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" value="{{ old('price', $product->price) }}" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" value="{{ old('quantity', $product->quantity) }}" name="quantity"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" value="{{ old('weight', $product->weight) }}" name="weight"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea class="form-control" name="details" id="details" cols="30" rows="5">{{ old('details', $product->details) }}</textarea>
                </div>
                <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
                    <label for="gallery">gallery</label>
                    <div class="needsclick dropzone" id="gallery-dropzone">

                    </div>
                    @if ($errors->has('gallery'))
                        <em class="invalid-feedback">
                            {{ $errors->first('gallery') }}
                        </em>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('style-alt')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('script-alt')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        "use strict";
        var uploadedGalleryMap = {}
        Dropzone.options.galleryDropzone = {
            url: "{{ route('admin.products.storeImage') }}",
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
                uploadedGalleryMap[file.name] = response.name
            },
            removedfile: function(file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedGalleryMap[file.name]
                }
                $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($product) && $product->gallery)
                    var files =
                        {!! json_encode($product->gallery) !!}
                    for (var i in files) {

                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        this.options.thumbnail.call(this, file, file.original_url)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }
    </script>
@endpush
