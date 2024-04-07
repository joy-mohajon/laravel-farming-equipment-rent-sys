@extends('layouts.app')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title">Create a post regarding farming equipment.</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('posts.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text-left">
                                            <label class="required @error('name') text-danger @enderror" for="name">
                                                Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" type="text"
                                                @if (old('name')) value="{{ old('name') }}"
                                                @else value="" @endif
                                                placeholder="Enter Name" />
                                            @error('name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text-left">
                                            <label class="required @error('quantity') text-danger @enderror" for="quantity">
                                                Quantity</label>
                                            <input class="form-control @error('quantity') is-invalid @enderror"
                                                id="quantity" name="quantity" type="number"
                                                @if (old('quantity')) value="{{ old('quantity') }}"
                                                @else value="" @endif
                                                placeholder="Enter quantity" />
                                            @error('quantity')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text-left">
                                            <label class="required @error('price') text-danger @enderror"
                                                for="price">Price for Buy</label>
                                            <input class="form-control @error('price') is-invalid @enderror" id="price"
                                                name="price" type="number" step="0.01"
                                                @if (old('price')) value="{{ old('price') }}"
                                                @else value="" @endif
                                                placeholder="Enter price" />
                                            @error('price')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text-left">
                                            <label class="required @error('rent') text-danger @enderror"
                                                for="rent">Price for Rent</label>
                                            <input class="form-control @error('rent') is-invalid @enderror" id="rent"
                                                name="rent" type="number" step="0.01"
                                                @if (old('rent')) value="{{ old('rent') }}"
                                                @else value="" @endif
                                                placeholder="Enter rent" />
                                            @error('rent')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="required @error('imageUrl') text-danger @enderror"
                                                for="InputFile">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input class="custom-file-input @error('imageUrl') is-invalid @enderror"
                                                        id="InputFile" name="imageUrl" type="file"
                                                        accept=".jpg, .jpeg, .png, .gif, .webp, .jfif"
                                                        @if (old('imageUrl')) value="{{ old('imageUrl') }}"
                                                        @else value="" @endif
                                                        placeholder="Upload image">
                                                    <label class="custom-file-label" for="InputFile">Choose file</label>
                                                </div>
                                            </div>
                                            @error('imageUrl')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <a class="btn btn-danger" href="{{ route('posts.index') }}">Cancel</a>
                                        <button class="btn btn-success" type="submit">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('plugin/adminLte/js/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
