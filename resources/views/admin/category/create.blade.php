
@extends('admin.layouts.admin')
 
@section('title')
 
  <title>Trang chu</title>
@endsection
 
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
    @include('admin.partials.content-header',['name'=> 'Category', 'key'=> 'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
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
        

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection