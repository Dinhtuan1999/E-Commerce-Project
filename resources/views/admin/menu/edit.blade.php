
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('content')

 <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=> 'Menu', 'key'=> 'Edit'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">

            <form action="{{route('menus.update', ['id' => $menu->id])}}" method="POST">
              @csrf
              <div class="form-group">
                <label>Tên Menu</label>
                <input type="text" class="form-control" placeholder="Nhập Tên Menu" name="menu_name" value="{{ $menu->name }}">
              </div>
              <div class="form-group">
                <label >Chọn Menu Cha</label>
                <select class="form-control" name="parent_id">
                  <option value="0">Chọn làm menu cha</option>
                  {!!$htmlOption!!}
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


      </div>
    </div>
  </div>
</div>
@endsection
