@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-folder"></i>&nbsp;&nbsp;Category List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/category/add') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Category</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            
          @include('admin.layouts._message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Meta Title</th>
                      <th>Meta Description</th>
                      <th>Meta Keywords</th>
                      <th>Created By</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->slug }}</td>
                      <td>{{ $value->meta_title }}</td>
                      <td>{{ $value->meta_description }}</td>
                      <td>{{ $value->meta_keywords }}</td>
                      <td>{{ $value->created_by_name }}</td>
                      @if($value->status == 0)
                        <td style="color: green;">Active</td>
                      @elseif($value->status == 1)
                        <td style="color: crimson;">Inactive</td>
                      @endif
                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/category/edit', $value->id) }}" class="btn btn-primary">
                          <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ url('admin/category/delete', $value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        
      </div>
    </section>
</div>

@endsection

@section('script')

@endsection