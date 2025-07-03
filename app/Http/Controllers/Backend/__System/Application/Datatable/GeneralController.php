<?php

namespace App\Http\Controllers\Backend\__System\Application\Datatable;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;

class GeneralController extends Controller {

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->middleware(['auth']);
    $this->model = 'App\Models\Backend\__System\Application\Datatable\General';
    $this->path = 'pages.backend.__system.application.datatable.general.';
    $this->url = '/dashboard/applications/datatables/generals';
    $this->data = $this->model::get();
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    foreach ($request->date as $data) {
      $store['date'] = \Carbon\Carbon::now()->format('Y') . '-'. $request->month . '-' . $data . ' ' . $request->time;
      $this->model::create($store);
    }

    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }


}
