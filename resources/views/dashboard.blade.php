@extends ('layouts.app')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Equipments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row --> --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-md-3">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info"
                                    style="background-image: url('{{ $post->imageUrl }}'); background-size: cover; width: 100%; height: 170px;">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h3 class="widget-user-username font-weight-normal mb-3 text-center">{{ $post->name }}
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">{{ $post->quantity }}</h5>
                                                <span class="description-text">Available</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <h5 class="description-header"><span
                                                        class="font-weight-bolder">৳</span>{{ $post->price }}/hr</h5>
                                                <span class="description-text">Price</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <x-primary-button class="w-50 mx-auto mt-3" type="submit">
                                        Rent
                                    </x-primary-button>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-md-3">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h3 class="widget-user-username font-weight-normal mb-3 text-center">Garden Tractor
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">2</h5>
                                                <span class="description-text">Available</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <h5 class="description-header"><span
                                                        class="font-weight-bolder">৳</span>12000/hr</h5>
                                                <span class="description-text">Price</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <x-primary-button class="w-50 mx-auto mt-3" type="submit">
                                        Rent
                                    </x-primary-button>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h3 class="widget-user-username font-weight-normal mb-3 text-center">Dumb Truck
                                    </h3>
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">5</h5>
                                                <span class="description-text">Available</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="description-block">
                                                <h5 class="description-header"><span
                                                        class="font-weight-bolder">৳</span>16000/hr</h5>
                                                <span class="description-text">Price</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <x-primary-button class="w-50 mx-auto mt-3" type="submit">
                                        Rent
                                    </x-primary-button>
                                </div>

                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
