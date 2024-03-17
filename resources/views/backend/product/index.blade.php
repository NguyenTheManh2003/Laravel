@extends('backend.layout.master')
@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lý product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a class="btn btn-success btn-sm mr-4" href="{{ route('admin.product.add') }}">Add Product</a>
                                    Add product
                                </a>
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-1">Code</th>
                                    <th class="col-2">Name</th>
                                    <th class="col-2">Price</th>
                                    <th class="col-2">Description</th>
                                    <th class="col-2">Image</th>
                                    <th class="col-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="col-1">{{ $product->id }}</td>
                                        <td class="col-1">{{ $product->code }}</td>
                                        <td class="col-2">{{ $product->name }}</td>
                                        <td class="col-2">{{ number_format($product->price) }} VND</td>
                                        <td class="col-2 project-description">
                                            <div
                                                style=" max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $product->description }}
                                            </div>
                                        </td>
                                        <td class="col-2">
                                            <img src="{{ asset('backend/product/img/' . $product->url_image) }}"
                                                alt="Ảnh mô tả" style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td class="col-2 project-actions text-right">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.product.edit', ['id' => $product->id]) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="d-flex">
                            {!! $products->links() !!}
                        </div>

                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
@stop
