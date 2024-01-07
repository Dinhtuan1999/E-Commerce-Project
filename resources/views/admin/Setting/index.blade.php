@extends('admin.layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/setting/css/setting_list.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header', ['name' => 'Setting', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ADD
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{route('settings.create') .'?type=text'}}">Text</a>
                              <a class="dropdown-item" href="{{route('settings.create'). '?type=textarea'}}">Textarea</a>
                            </div>
                          </div>

                    </div>
                    <div class="col-md-12 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Config Key</th>
                                    <th scope="col">Config Value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (@$settings as $key => $setting)
                                    <tr id="tr">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $setting->config_key }}</td>
                                        <td>{!! $setting->config_value !!}</td>

                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('settings.edit', ['id' => $setting->id]).'?type='.$setting->type }}">Edit</a>
                                            <a class="btn btn-danger action_delete" href=""
                                                data-url="{{ route('settings.delete', ['id' => $setting->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {!! $settings->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admins/library/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('admins/js/main.js') }}"></script>
@endsection
