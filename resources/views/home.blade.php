
@extends('admin.layouts.admin')

@section('title')

  <title>Trang chu</title>
@endsection

@section('content')

 <div class="content-wrapper">
  @include('admin.partials.content-header',['name'=> 'Home', 'key'=> 'Home'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
            Trang chu
        </div>


      </div>
    </div>
  </div>
</div>
@endsection
