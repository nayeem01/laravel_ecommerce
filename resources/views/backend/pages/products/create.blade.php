@extends('backend.layout.template')

@section('adminbodycontent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add New Product </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create </li>
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
                            <h3 class="card-title">Add product </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">

                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>product title</label>
                                    <input type="text" name="title" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control" rows="5"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for=""> Brand name</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">please select brand</option>

                                        @foreach (App\Models\Backend\Brand::orderby('id','desc')->get() as $x)

                                        <option value="{{$x->id}}">{{$x->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for=""> Category name</label>
                                    <select name="cat_id" class="form-control">
                                        <option value="">please select Category</option>
                                        @foreach (App\Models\Backend\Category::orderby('id','asc')->where('parent_id',
                                        0)->get() as $x)

                                        <option value="{{$x->id}}">{{$x->name}}</option>

                                        @foreach (App\Models\Backend\Category::orderby('id','asc')->where('parent_id',
                                        $x->id)->get() as $child)

                                        <option value="{{$child->id}}">--{{$child->name}}</option>

                                        @endforeach

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Regular price</label>
                                    <input type="text" name="rprice" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>offer price</label>
                                    <input type="text" name="oprice" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>product quantity</label>
                                    <input type="text" name="quantity" class="form-control" required="required">
                                </div>

                                <div class="form-group">
                                    <label>status</label>
                                    <select name="status" class="form-control">

                                        <option value="1">active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Main thumnail</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">image 2</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">image 3</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">image 3</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">image 4</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">image 5</label>
                                            <input type="file" name='p_image[]' class="form-control-file">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="addProduct" class="btn btn-primary btn-block"
                                        value="Add new product">
                                </div>

                            </form>

                        </div>
                    </div>
                    {{-- card end --}}
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    </section>

</div>
@endsection