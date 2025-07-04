@extends('layouts.backend.default')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.details') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ $url }}" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a data-toggle="modal" data-target="#qrcode_modal" class="btn btn-icon btn-xs btn-hover-light-primary"title="{{ __('default.label.qr-code') }}"><i class="fas fa-qrcode"></i></a>
          <a class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.print') }}" onclick="printData('printData')"><i class="fas fa-print"></i></a>
          <a href="{{ URL::Current() }}/edit" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.edit') }}"><i class="fas fa-pencil-alt"></i></a>
          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-original-title="{{ __('default.label.export.description-excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" data-original-title="{{ __('default.label.export.description-pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
          <form method="POST" id="exilednoname-form" action="{{ URL::current() }}/../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <a id="delete" class="btn btn-icon btn-xs btn-hover-light-primary" title="{{ __('default.label.delete./') }}"><i class="fas fa-trash text-danger"></i></a>
          </form>
        </div>
      </div>
      <div class="card-body">
        <div id="printData">
          <div class="table-responsive">
            <table class="table table-hover table-head-custom table-checkable table-sm">
              @yield('table-header')
              <tr>
                <td> {{ __('default.label.date') }} </td>
                <td> {{ \Carbon\Carbon::parse($data->date)->format('d F Y, H:i') }} </td>
              </tr>
              <tr>
                <td> {{ __('default.label.active') }} </td>
                <td>
                  @if( $data->active == 1 )
                  {{ __('default.label.yes') }}
                  @else
                  {{ __('default.label.no') }}
                  @endif
                </td>
              </tr>
              <tr>
                <td> {{ __('default.label.status') }} </td>
                <td>
                  @if( $data->status == 1 )
                  {{ __('default.label.pending') }}
                  @elseif( $data->status == 2 )
                  {{ __('default.label.processing') }}
                  @elseif( $data->status == 3 )
                  {{ __('default.label.in-progress') }}
                  @elseif( $data->status == 4 )
                  {{ __('default.label.success') }}
                  @else
                  {{ __('default.label.unknown') }}
                  @endif
                </td>
              </tr>
              <tr>
                <td> {{ __('default.label.created_at') }} </td>
                <td> {{ \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') }} </td>
              </tr>
              <tr>
                <td width="50%"></td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3">
    <div class="card card-custom gutter-b" data-card="true">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.activities') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body">
        <!--  -->
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="qrcode_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> {{ __('default.label.qr-code') }} </h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
        <div id="printQR">
          <p class="text-center"> {!! QrCode::size(300)->generate(URL::current()); !!} </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-icon btn-outline-primary" onclick="printQR('printQR')"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  function printData(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }

  function printDataActivities(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<script>
  function printQR(divName){
    var myWindow=window.open('','','');
    myWindow.document.write(document.getElementById(divName).innerHTML);
    myWindow.document.close();
    myWindow.focus();
    myWindow.print();
    myWindow.document.close();
  }
</script>

<script>
  $('body').on('click', '#delete', function (e) {
    e.preventDefault()
    Swal.fire({ text: "{{ __('default.notification.confirm.delete') }}?", icon: "warning", showCancelButton: true, confirmButtonText: '{{ __("default.label.yes") }}', cancelButtonText: '{{ __("default.label.no") }}', reverseButtons: false }).then(function(result) {
      if (result.value) {
        $(e.target).closest('form').submit()
      }
    });
  });
</script>
@endpush
