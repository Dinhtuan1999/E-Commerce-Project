
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('content')

 <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=> 'Category', 'key'=> 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-6">

            <form action="{{route('categories.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label>Tên Danh Mục</label>
                <input type="text" class="form-control" placeholder="Nhập Tên Danh Mục" name="category_name">
              </div>
              <div class="form-group">
                <label >Chọn Danh Mục Cha</label>
                <select class="form-control" name="parent_id">
                  <option value="0">Chọn làm danh mục cha</option>
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
