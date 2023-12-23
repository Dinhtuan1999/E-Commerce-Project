
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
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
        <div class="col-md-12">
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
            <tbody>

                @foreach ($products as $key => $product)
                <tr>
                    <td>{{++$key }}</td>
                    <td>{{ $product->name  }}</td>
                    <td>{{ $product->price  }}</td>
                    <td>{{ $product->feature_image_path  }}</td>
                    <td>{{ $product->categori_id  }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('products.edit',['id' => $product->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('products.delete',['id' => $product->id]) }}">Delete</a>
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
