@extends('admin.layouts.admin')

@section('title')
    <title>Sửa Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/css/product_create.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/css/product_edit.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/ckeditor/ckeditor.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content" >
                <div class="container-fluid">
                    <div class="row" >

                        <div class="col-md-12">
                            <div class="form-group row" >
                                <label class="col-md-2">Tên sản phẩm</label>
                                <div class="col-md-6"><input type="text" class="form-control  @error('product_name') is-invalid @enderror"
                                        placeholder="Nhập Tên Sản Phẩm" name="product_name" value="{{ $product->name }}">
                                        @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                    </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Giá</label>
                                <div class="col-md-6  @error('price') is-invalid @enderror">
                                    <input type="text" class="form-control" placeholder="Nhập Giá Sản Phẩm"
                                        name="price" value="{{ $product->price }}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Ảnh Chính</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file  @error('feature_image_path') is-invalid @enderror" name="feature_image_path">
                                    @error('feature_image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                    <div class="row container_feature_image">
                                        <div class="col-md-4">
                                            <img class="product_feature_image" src="{{ $product->feature_image_path }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Ảnh Chi Tiết</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path[]" multiple>
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                    <div class="col-md-12 container_image_detail">
                                        <div class="row">
                                            @foreach ($product->productImages as $productImage)
                                                <div class="col-md-3">
                                                    <img class="product_image_detail" src="{{ $productImage->image_path }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Tag</label>
                                <div class="col-md-6">
                                    <select class="form-control tag_select_choose @error('tags') is-invalid @enderror" multiple="multiple" name="tags[]">
                                        @foreach ($product->productTags as $productTag)
                                            <option value="{{ $productTag->name }}" selected>{{ $productTag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Chọn Danh Mục</label>
                                <div class="col-md-6">
                                    <select class="form-control category_select_choose @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">Chọn làm menu cha</option>
                                        {!! $htmlOption !!}
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">

                                <label class="col-md-2">Mô tả sản phẩm</label>
                                <div class="col-md-9">
                                    <textarea class="form-control ckeditor_init  @error('content') is-invalid @enderror" rows="10" name="content">{{ $product->content }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $message !!}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js')
    <script src="{{ asset('admins/library/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('admins/library/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/product/js/product_create.js') }}"></script>
    <script src="{{ asset('admins/library/ckeditor/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor_init'), {
                ckfinder: {
                    uploadUrl: '{{ route('products.ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            }, {
                alignment: {
                    options: ['right', 'right']
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            })
    </script>
@endsection
