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
        <form action="{{ route('products.update',['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập Tên Sản Phẩm"
                                    name="product_name" value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Nhập Giá Sản Phẩm" name="price"
                                    value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label>Ảnh Chính</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="row container_feature_image">
                                    <div class="col-md-4">
                                        <img class="product_feature_image" src="{{ $product->feature_image_path }}"
                                            alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Ảnh Chi Tiết</label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple>
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

                            <div class="form-group">
                                <label>Tag</label>
                                <select class="form-control tag_select_choose" multiple="multiple" name="tags[]">
                                    @foreach ($product->productTags as $productTag)
                                        <option value="{{ $productTag->name }}" selected>{{ $productTag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Chọn Danh Mục</label>
                                <select class="form-control category_select_choose" name="category_id">
                                    <option value="">Chọn làm menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control ckeditor_init" rows="10" name="content">{{ $product->content }}</textarea>
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
