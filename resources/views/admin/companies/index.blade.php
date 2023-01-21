@extends('admin.layouts.app')

@section('content')
    <body>
        <div class="container">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered company_datatable" id="datatable-crud">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var table = $('.company_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('companies.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
