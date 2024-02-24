@extends('layouts.app')

@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage posts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">posts</li>
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
                                        @can('post_create')
                                            <a class="btn btn-primary btn-flat" href="{{ route('posts.create') }}"> Add post
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
                                    <button type="button" id="clearpostFilter" class="btn btn-outline-danger">Clear</button>
                                </div>
                            </form> --}}
                            <table class="table-bordered table-hover table-striped table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Equipment Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $key => $post)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $post->name }}</td>
                                            <td>{{ $post->quantity }}</td>
                                            <td>{{ $post->price }}</td>
                                            <td class="text-center">
                                                @can('post_update')
                                                    <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan
                                                @can('post_delete')
                                                    <button class="btn btn-danger btn-sm delete-post" type="button"
                                                        post-id="{{ $post->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="5">No data 😢</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if (count($posts) > 0)
                            <div class="card-footer">
                                <div class="float-left">
                                    <span>Showing </span> <b>{{ $posts->firstItem() }}</b>
                                    <span>to </span> <b>{{ $posts->lastItem() }}</b> from
                                    <span>total: </span> <b>{{ $posts->total() }}</b>
                                </div>
                                <div class="float-right">
                                    {{ @$posts->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        @endif
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
            $('#clearpostFilter').click(() => {
                $('input[name="column_filter_name"]').val('');
                window.location.href = "{{ route('posts.index') }}";
            })
        });

        $(document).ready(function() {
            $("body").on("click", ".delete-post", function() {

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
                        let post_id = $(this).attr("post-id");
                        $.ajax({
                            url: 'posts/' + post_id,
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
