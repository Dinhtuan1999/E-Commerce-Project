@extends('admin.layouts.admin')

@section('title')
    <title>Thêm Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('admin/library/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/product/product.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập Tên Sản Phẩm"
                                    name="product_name">
                            </div>

                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" placeholder="Nhập Giá Sản Phẩm" name="price">
                            </div>

                            <div class="form-group">
                                <label>Ảnh Chính</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label>Ảnh Chi Tiết</label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple>
                            </div>

                            <div class="form-group">
                                <label>Tag</label>
                                <select class="form-control tag_select_choose" multiple="multiple" name="tag[]">

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Chọn Danh Mục</label>
                                <select class="form-control category_select_choose" name="parent_id">
                                    <option value="">Chọn làm menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control ckeditor_init" rows="8" name="content"></textarea>
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
    <script src="{{ asset('admin/library/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{ asset('admin/library/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/product/product.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

@endsection
