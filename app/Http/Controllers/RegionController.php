<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/regions');
    }

    public function anyData()
    {
        $regions = Region::all();
        return DataTables::of($regions)
            ->addIndexColumn()
            ->make(true);
    }
}
