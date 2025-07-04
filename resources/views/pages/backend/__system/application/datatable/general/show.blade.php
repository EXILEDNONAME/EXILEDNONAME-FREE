@extends('layouts.backend.__templates.show')

@section('table-header')
<tr>
  <td> Name </td>
  <td> {{ $data->name }} </td>
</tr>
<tr>
  <td> Description </td>
  <td> {{ $data->description }} </td>
</tr>
@endsection
