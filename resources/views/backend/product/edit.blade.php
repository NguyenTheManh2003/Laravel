@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
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
                            <form action="{{ route('admin.product.doEdit') }}" method="post">
                                @csrf
                                {{-- ẩn id nhưng vẫn lấy data được --}}
                                <input type="hidden" name='id' value="{{ $sp->id }}">
                                <div class="form-group">
                                    <label for="inputName">Mã sản phẩm</label>
                                    <input type="text" id="code" name="code" class="form-control"
                                        value="{{ $sp->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Tên sản phẩm</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $sp->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Giá</label>
                                    <input type="text" id="price" name="price" class="form-control"
                                        value="{{ $sp->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Mô tả</label>
                                    <textarea id="description" name="description" class="form-control"
                                        rows="4">{{ $sp->description }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success float-right">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <!-- Bạn cần wrap nút Create new Project trong form -->
                    <!-- Cũ: <input type="submit" value="Create new Project" class="btn btn-success float-right"> -->
                    <button type="submit" class="btn btn-success float-right">Create new Project</button>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@stop
