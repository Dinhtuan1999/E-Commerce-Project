
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('css')
    <link href="{{ asset('admins/product/css/product_list.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/library/select2/select2.min.css') }}" rel="stylesheet" />

@endsection


@section('content')

 <div class="content-wrapper">
  @include('admin.partials.content-header',['name'=> 'Product', 'key'=> 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12 ">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody >

                @foreach (@$products as $key => $product)
                <tr id="tr">
                    <td>{{++$key }}</td>
                    <td>{{ $product->name  }}</td>
                    <td>{{ $product->price  }}</td>
                    <td>
                        <img class="product_image" src="{{ $product->feature_image_path  }}" alt="">
                    </td>
                    <td>{{ optional($product->category)->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('products.edit',['id' => $product->id]) }}">Edit</a>
                        <a class="btn btn-danger action_delete" href="" data-url="{{ route('products.delete',['id' => $product->id]) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admins/library/sweetalert2/sweetalert2@11.js') }}"></script>
<script src="{{ asset('admins/product/js/product_list.js') }}"></script>
<script src="{{ asset('admins/js/main.js') }}"></script>

@endsection
