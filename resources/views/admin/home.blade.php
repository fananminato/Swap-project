@extends('admin.master')
@section('content')
    <div class="table-responsive">

        <table CELLSPACING=0 CELLPADDING=0 BORDER=0 align="center" class="table table-striped">
            @if (Session::has('msg'))
                <tr>
                    <td align=center><span style="color: blue">{!! ucwords(session('msg')) !!}</span></td>
                </tr>
            @endif

            <tr>
                <td align=center style="color:#1fa337; " height="100"></td>
            </tr>
            <tr>
                <td align=center class="text-custom">
                    <h1>WELCOME </h1>
                </td>
            </tr>
            <tr>
                <td align=center class="text-custom">
                    <h2> To </h2>
                </td>
            </tr>
            <tr>
                <td align=center class="text-custom">
                    <h2> AMC Corporation </h2>
                </td>

            </tr>
            <tr>
                <td align=center style="color:#1fa337" height="100"></td>
            </tr>

        </table>
    </div>
@endsection
