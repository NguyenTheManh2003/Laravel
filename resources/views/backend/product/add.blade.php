@extends('backend.layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.doAdd') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Product Code</label>
                                    <input type="text" id="code" name="code" class="form-control"
                                        value="{{ old('code') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Price</label>
                                    <input type="text" id="price" name="price" class="form-control"
                                        value="{{ old('price') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Image</label>
                                    <input type="file" id="image" name="image" class="form-control-file"
                                        accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputCategory">Danh mục</label>
                                    <input type="text" id="category" name="category" class="form-control"
                                        value="{{ old('cate_id') }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a type="submit" href="{{ route('admin.product.index') }}"class="btn btn-success float-right">Add Product</a>
                                    </div>
                                    <div class="col-6">
                                        <a 
                                            class="btn btn-secondary float-left">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@stop
