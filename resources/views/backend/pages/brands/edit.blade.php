@extends('backend.layout.template')

@section('adminbodycontent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update brand </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update brand</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">

                            <form action="{{ route('brands.update', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" name="name" class="form-control" required="required"
                                        value="{{$brand->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control" rows="5">{{$brand->des}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label> <br>

                                    @if ($brand->image == NULL)
                                    No image found
                                    @else
                                    <img src="{{ asset('backend/img/brands/' . $brand->image) }}" width="100">
                                    @endif
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="form-group">

                                    <input type="submit" name="addBrand" class="btn btn-primary btn-block"
                                        value="save chamges">
                                </div>
                            </form>

                        </div>
                    </div>
                    {{-- card end --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>

@endsection