@extends('admin.layouts.admin')

@section('title')
    <title>Thêm Slider</title>
@endsection

@section('css')
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/slider/css/slider_create.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/ckeditor/ckeditor.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Setting', 'key' => 'Add'])
        <form action="{{ route('settings.store').'?type='.request()->type }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group row">
                                <label class="col-md-2">Config Key</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                        placeholder="Nhập Tên Config Key" name="config_key" value="{{ old('config_key') }}">
                                    @error('config_key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            @if (request()->type === 'text')
                            <div class="form-group row">
                                <label class="col-md-2">Config Value</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                        placeholder="Nhập Tên slider" name="config_value" value="{{ old('config_value') }}">
                                    @error('config_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            @elseif (request()->type === 'textarea')
                            <div class="form-group row">
                                <label class="col-md-2">Config Value</label>
                                <div class="col-md-6">
                                    <textarea class="form-control ckeditor_init  @error('config_value') is-invalid @enderror" rows="10" name="config_value">{{ old('config_value') }}</textarea>


                                    @error('config_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{!! $message !!}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            @endif



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
