@extends('voyager::master')

@section('content')
    <h1 class="page-title">
        <i class="icon voyager-paperclip"></i> URLS list
    </h1>
    <a href="{{ route('newurl') }}" class="btn btn-primary"><i class="voyager-list-add"></i>&nbsp;New url</a>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="urls" class="table dataTable table-hover">
                    <thead class="thead-light sticky-top">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 30%;">Url</th>
                        <th style="width: 30%;" data-orderable="false">Description</th>
                        <th>Created at</th>
                        <th style="width:80px;" data-orderable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {
            $('#urls').DataTable({
                'processing': true,
                'serverSide': true,
                'stateSave': true,
                'lengthMenu': [5, 10, 20, 50, 100, 200, 500],
                'pageLength': 10,
                'ajax': {
                    'dataType': 'json',
                    'type': 'POST',
                    'url': '{{ route('geturls') }}',
                    'data': {_token: '{{csrf_token()}}'},
                },
                'order': [[ 0, 'asc' ]],
                'columns': [
                    {'data': 'id'},
                    {'data': 'url'},
                    {'data':'description'},
                    {'data':'created_at'},
                    {'data':'actions'}
                ]
            });
        });
    </script>
@endsection
