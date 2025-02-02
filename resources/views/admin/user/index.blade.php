@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h4 class="box-title">User List</h4>
                <a href="{{ route('users.create') }}" class="pull-right">
                    <button type="button" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i>
                        Add new
                    </button>
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="slider-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            @role('admin')
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ $result->getRoleNames() }}</td>
                                @role('admin')
                                <td style="text-align: center;">
                                    <a href="{{ route('users.edit', ['id' => $result->id]) }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                
                                <td style="text-align: center;">
                                    <a href="JavaScript:del('{{ route('users.delete', ['id' => $result->id]) }}')">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#slider-table').DataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bsearch": true,
            "bAutoWidth": false,
        });
    });
</script>
@endsection
