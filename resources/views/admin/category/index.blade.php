
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('content')

 <div class="content-wrapper">
  @include('admin.partials.content-header',['name'=> 'Category', 'key'=> 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr>
                    <td>{{++$key }}</td>
                    <td>{{ $category->name  }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('categories.edit',['id' => $category->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('categories.delete',['id' => $category->id]) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
