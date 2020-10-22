@extends('backend.layout.template')

@section('adminbodycontent')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage All products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('product.manage')}}">Dashboad</a></li>
                        <li class="breadcrumb-item active">Manage products </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    {{-- card start --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All product List</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">

                            <table class="table">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">#SI</th>
                                        <th scope="col">Thumnail</th>
                                        <th scope="col">product title</th>
                                        <th scope="col">category</th>
                                        <th scope="col">brand</th>
                                        <th scope="col">status</th>
                                        <th scope="col">price</th>
                                        <th scope="col">offer price</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>


                                        </td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product-> category['name']}}</td>
                                        <td>{{$product-> brand-> name}}</td>
                                        <td>
                                            @if ($product->status == 1)

                                            <span class="badge badge-success">active</span>
                                            @else
                                            <span class="badge badge-danger">Deactive</span>
                                            @endif

                                        </td>
                                        <td>{{$product->price}} BDT</td>
                                        <td>
                                            @if ($product->offer_price == null)
                                            <span class="badge badge-info">N/A</span>
                                            @else
                                            <span class="badge badge-success">{{$product->offer_price}}</span>
                                            @endif

                                        </td>
                                        <td>{{$product->quantity}} pcs</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('product.edit', $product->id )}}"
                                                    class="btn btn-success btn-sm">Update</a>
                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deletecat{{ $product->id }}">Delete</a>



                                                <!-- Modal Start -->
                                                <div class=" modal fade" id="deletecat{{ $product->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> Are sure
                                                                    ?
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="action-btn">
                                                                    <form
                                                                        action="{{ route('product.destroy', $product->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal End -->

                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>


                        </div>

                    </div>
                    {{-- card end --}}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection