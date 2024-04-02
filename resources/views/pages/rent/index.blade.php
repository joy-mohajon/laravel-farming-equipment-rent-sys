@extends('layouts.app')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage rents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">rents</li>
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
                                        @can('rent_create')
                                            <a class="btn btn-primary btn-flat" href="{{ route('rents.create') }}"> Add rent
                                            </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body Start -->
                        <div class="card-body">
                            {{-- <form action="{{url()->current()}}" method="GET" >
                                <div class="input-group mb-3">
                                    <input name="column_filter_name" type="text" value="{{ Request::get('column_filter_name') }}" class="form-control" placeholder="Search by area" >

                                    <button type="submit" class="btn btn-outline-success">Filter</button>
                                    <button type="button" id="clearrentFilter" class="btn btn-outline-danger">Clear</button>
                                </div>
                            </form> --}}
                            <table class="table-bordered table-hover table-striped table">
                                <thead>
                                    <tr class="text-center">
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Address</th>
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
                                        @forelse ($rents as $key => $rent)
                                            <tr class="text-center">
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $rent->name }}</td>
                                                <td>{{ $rent->address }}</td>
                                                <td>{{ $rent->amount }}</td>
                                                <td>{{ $rent->transaction_id }}</td>
                                                <td><span
                                                        class="badge @if ($rent->status == 'Approved') badge-success @else badge-secondary @endif">{{ $rent->status }}</span>
                                                </td>
                                                @can('post_list')
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="{{ route('rents.edit', $rent->id) }}">Confirmed</a>
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
                                        @forelse ($rents as $key => $rent)
                                            <tr class="text-center">
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $rent['name'] }}</td>
                                                <td>{{ $rent['address'] }}</td>
                                                <td>{{ $rent['amount'] }}</td>
                                                <td>{{ $rent['transaction_id'] }}</td>
                                                <td><span
                                                        class="badge @if ($rent['status'] == 'Approved') badge-success @else badge-secondary @endif">{{ $rent['status'] }}</span>
                                                </td>
                                                @can('post_list')
                                                    <td>
                                                        <a class="btn btn-warning"
                                                            href="{{ route('rents.edit', $rent['id']) }}">Confirmed</a>
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
                        {{-- @if (count($rents) > 0)
                            <div class="card-footer">
                                <div class="float-left">
                                    <span>Showing </span> <b>{{ $rents->firstItem() }}</b>
                                    <span>to </span> <b>{{ $rents->lastItem() }}</b> from
                                    <span>total: </span> <b>{{ $rents->total() }}</b>
                                </div>
                                <div class="float-right">
                                    {{ @$rents->links('pagination::bootstrap-4') }}
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
            $('#clearrentFilter').click(() => {
                $('input[name="column_filter_name"]').val('');
                window.location.href = "{{ route('rents.index') }}";
            })
        });

        $(document).ready(function() {
            $("body").on("click", ".delete-rent", function() {

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
                        let rent_id = $(this).attr("rent-id");
                        $.ajax({
                            url: 'rents/' + rent_id,
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
