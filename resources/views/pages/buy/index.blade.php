@extends('layouts.app')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage buys</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">buys</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- Card Start -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3 offset-md-9">
                                    <div class="float-right">
                                        @can('buy_create')
                                            <a class="btn btn-primary btn-flat" href="{{ route('buys.create') }}"> Add buy
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body Start -->
                        <div class="card-body">
                            {{-- <form action="{{url()->curbuy()}}" method="GET" >
                                <div class="input-group mb-3">
                                    <input name="column_filter_name" type="text" value="{{ Request::get('column_filter_name') }}" class="form-control" placeholder="Search by area" >

                                    <button type="submit" class="btn btn-outline-success">Filter</button>
                                    <button type="button" id="clearbuyFilter" class="btn btn-outline-danger">Clear</button>
                                </div>
                            </form> --}}
                            <table class="table-bordered table-hover table-striped table">
                                <thead>
                                    <tr class="text-center">
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Equipment name</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Transaction Id</th>
                                        <th>Status</th>
                                        @can('post_list')
                                            <th>Action</th>
                                        @endcan
                                    </tr>
                                </thead>
                                @if (auth()->check() && auth()->user()->hasRole('borrower'))
                                    <tbody>
                                        @forelse ($buys as $key => $buy)
                                            <tr class="text-center">
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $buy->name }}</td>
                                                <td>{{ $buy->address }}</td>
                                                <td>{{ $buy->equipment_name }}</td>
                                                <td>{{ $buy->equipment_quantity }}</td>
                                                <td>{{ $buy->amount }}</td>
                                                <td>{{ $buy->transaction_id }}</td>
                                                <td><span
                                                        class="badge @if ($buy->status == 'In-progress') badge-secondary @else badge-success @endif">{{ $buy->status }}</span>
                                                </td>
                                                @can('post_list')
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="{{ route('buys.edit', $buy->id) }}">Confirmed</a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="9">No data 😢</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @else
                                    <tbody>
                                        @forelse ($buys as $key => $buy)
                                            <tr class="text-center">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $buy['name'] }}</td>
                                                <td>{{ $buy['address'] }}</td>
                                                <td>{{ $buy['equipment_name'] }}</td>
                                                <td>{{ $buy['equipment_quantity'] }}</td>
                                                <td>{{ $buy['amount'] }}</td>
                                                <td>{{ $buy['transaction_id'] }}</td>
                                                <td><span
                                                        class="badge @if ($buy['status'] == 'In-progress') badge-secondary @else badge-success @endif">{{ $buy['status'] }}</span>
                                                </td>
                                                @can('post_list')
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="{{ route('buys.edit', $buy['id']) }}">Confirmed</a>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="9">No data 😢</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @endif

                            </table>
                        </div>
                        {{-- @if (count($buys) > 0)
                            <div class="card-footer">
                                <div class="float-left">
                                    <span>Showing </span> <b>{{ $buys->firstItem() }}</b>
                                    <span>to </span> <b>{{ $buys->lastItem() }}</b> from
                                    <span>total: </span> <b>{{ $buys->total() }}</b>
                                </div>
                                <div class="float-right">
                                    {{ @$buys->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        @endif --}}
                        <!-- Card Body End -->
                    </div>
                    <!-- Card End -->
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $('#clearbuyFilter').click(() => {
                $('input[name="column_filter_name"]').val('');
                window.location.href = "{{ route('buys.index') }}";
            })
        });

        $(document).ready(function() {
            $("body").on("click", ".delete-buy", function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        let buy_id = $(this).attr("buy-id");
                        $.ajax({
                            url: 'buys/' + buy_id,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            type: 'delete',
                            success: function(result) {
                                Swal.fire(
                                    'Deleted!',
                                    result.status,
                                    'success'
                                );
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        });

                    }
                })
            });
        });
    </script>
@endsection
