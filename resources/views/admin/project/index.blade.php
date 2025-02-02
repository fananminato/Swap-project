@extends('admin.master')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #333;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h4 class="box-title">Project List</h4>
                <a href="{{ route('projects.create') }}" class="pull-right">
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
                            <th>Title</th>
                            <th>Funding</th>
                            <th>Assign Data</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Edit</th>
                            @role('admin')
                            <th style="text-align: center;">Delete</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->title }}</td>
                                <td>{{ $result->funding }}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#assignData{{ $result->id }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </a>
                                    <div class="modal fade" id="assignData{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="assignData{{ $result->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Assign Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('projects.assign-user', ['id' => $result->id]) }}" method="post">
                                                        @csrf
                                                        <div class="row" style="margin-bottom: 20px;">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="user_id" class="col-md-3">Assistant</label>
                                                                    <div class="col-md-9">
                                                                        <select name="user_id[]" id="example" class="form-control" multiple="multiple" style="width: 300px;">

                                                                            @foreach ($assistants as $data)
                                                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="data" class="col-md-3"></label>
                                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td style="text-align: center;">
                                    @if ($result->status == 'ongoing')
                                        <a href="JavaScript:status('{{ route('projects.change-status', ['id' => $result->id, 'status' => 'completed']) }}')">
                                            <span class="label label-success">Ongoing</span>
                                        </a>
                                    @else
                                        <a href="JavaScript:status('{{ route('projects.change-status', ['id' => $result->id, 'status' => 'ongoing']) }}')">
                                            <span class="label label-danger">Completed</span>
                                        </a>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('projects.edit', ['id' => $result->id]) }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                @role('admin')
                                    @if($result->status == 'completed')
                                    <td style="text-align: center;">
                                        <a href="JavaScript:del('{{ route('projects.delete', ['id' => $result->id]) }}')">
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                    @endif
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

        $('#example').select2({
            tags: true,
            placeholder: "Select a Data",
            allowClear: true
        });
    });
</script>
@endsection
