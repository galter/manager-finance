@extends('layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-4">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Add category</h3>
              </div>
                <form class="form-horizontal" action="{{url('categories')}}" method="POST">
                  @csrf
                  <div class="box-body">
                    <div class="form-group @error('title') has-error @enderror">
                      <label for="title" class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Alimentação">
                        @error('title')
                          <span class="help-block">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="type" class="col-sm-2 control-label">Type</label>
                      <div class="col-sm-10">
                        <select name="type" id="type" class="form-control">
                          <option value="c">Credit</option>
                          <option value="d">Debit</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>
              </form>
            </div>
          </div>
          <div class="col-md-8">
              <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    @if(!empty($data))
                      @include('includes.datatables', ['data' => $data, 'actions' => ['delete' => url('categories/delete')]])
                    @endif
                  </div>
                  <!-- /.box-body -->
              </div>
          </div>
      </div>
    </section>

@endsection
