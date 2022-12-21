<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/categories');
    }

    public function anyData()
    {
        $categories = Category::all();
        return DataTables::of($categories)
            ->addIndexColumn()
            ->make(true);
    }
}
