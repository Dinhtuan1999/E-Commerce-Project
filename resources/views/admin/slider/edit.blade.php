@extends('admin.layouts.admin')

@section('title')
    <title>Sửa Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/slider/css/slider_create.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/slider/css/slider_edit.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/ckeditor/ckeditor.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])
        <form action="{{ route('sliders.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-2">Tên slider</label>
                                <div class="col-md-6"><input type="text"
                                        class="form-control  @error('slider_name') is-invalid @enderror"
                                        placeholder="Nhập Tên Slider" name="slider_name" value="{{ $slider->name }}">
                                    @error('slider_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-group row">
                                <label class="col-md-2">Ảnh Slider</label>
                                <div class="col-md-6">
                                    <input type="file"
                                        class="form-control-file  @error('image_path') is-invalid @enderror"
                                        name="image_path">
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror
                                    <div class="row container_feature_image">
                                        <div class="col-md-4">
                                            <img class="product_feature_image" src="{{ $slider->image_path }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row">

                                <label class="col-md-2">Mô tả slider</label>
                                <div class="col-md-9">
                                    <textarea class="form-control ckeditor_init  @error('description') is-invalid @enderror" rows="10"
                                        name="description">{{ $slider->description }}</textarea>
                                    @error('description')
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
    <script src="{{ asset('admins/slider/js/slider_create.js') }}"></script>
    <script src="{{ asset('admins/library/ckeditor/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor_init'), {
                ckfinder: {
                    uploadUrl: '{{ route('sliders.ckeditor.upload') . '?_token=' . csrf_token() }}',
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
