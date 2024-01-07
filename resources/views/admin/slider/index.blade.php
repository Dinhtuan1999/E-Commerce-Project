
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/slider/css/slider_list.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />

@endsection


@section('content')

 <div class="content-wrapper">
  @include('admin.partials.content-header',['name'=> 'Slider', 'key'=> 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12 ">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên silder</th>
                <th scope="col">Mô tả slider</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody >

                @foreach (@$sliders as $key => $slider)
                <tr id="tr">
                    <td>{{++$key }}</td>
                    <td>{{ $slider->name  }}</td>
                    <td>{!! $slider->description  !!}</td>
                    <td>
                        <img class="product_image" src="{{ $slider->image_path  }}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('sliders.edit',['id' => $slider->id]) }}">Edit</a>
                        <a class="btn btn-danger action_delete" href="" data-url="{{ route('sliders.delete',['id' => $slider->id]) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            {!! $sliders->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admins/library/sweetalert2/sweetalert2@11.js') }}"></script>
<script src="{{ asset('admins/slider/js/slider_list.js') }}"></script>
<script src="{{ asset('admins/js/main.js') }}"></script>

@endsection
