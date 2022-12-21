@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row py-5">
                <div class="col-sm-12">
                    <h4 class="page-title">Regions</h4>
                </div>
            </div>

            <table id="table" class="table table-striped table-hover table-condensed yajra-datatable">
                <thead class="thead-default">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    var table;
    
    $(document).ready(function() {
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            order: [ [3, 'desc'] ],
            dom: 'Bfrtip',
            ajax: '{{ route('list-regions') }}',
            columns: [
                {data: 'id', name: 'id'},
                { data: 'name', name: 'name' },
                { data: 'slug', name: 'slug' },
                { data: 'status', name: 'status' },
            ],
            buttons: [
                    'pageLength',
                ],
        });
    });

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }
    
</script>

@endsection