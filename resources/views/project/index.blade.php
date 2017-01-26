@extends('layouts.app')
@section('left-nav')
    @include('project.left-menu')
@endsection
@section('content')
<form action="{{url('/project/selected/delete')}}" method="post">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="DELETE">
<table class="ui compact celled definition table">

<thead class="full-width">
    <tr>
        <th></th>
        <th>專案名稱</th>
        <th>專案代號</th>
        <th>建立者</th>
        <th>建立時間</th>
    </tr>
</thead>
<tbody>

</tbody>
<tfoot class="full-width">
    <tr>
        <th></th>
        <th colspan="4">
        <button type="submit" class="ui small orange button">
            刪除
        </button>
        </th>
    </tr>
</tfoot>
</table>
</form>
@endsection
@section('right-nav')
    <project-right-nav></project-right-nav>
@endsection
