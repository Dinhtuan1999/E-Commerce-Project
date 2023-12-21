
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('content')

 <div class="content-wrapper">
  @include('admin.partials.content-header',['name'=> 'Menu', 'key'=> 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Menu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($menus as $key => $menu)
                <tr>
                    <td>{{++$key }}</td>
                    <td>{{ $menu->name  }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('menus.edit',['id' => $menu->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('menus.delete',['id' => $menu->id]) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12">
            {!! $menus->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
