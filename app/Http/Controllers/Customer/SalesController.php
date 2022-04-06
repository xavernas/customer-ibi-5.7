<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Customer;
use CustomerRegion;
USE Sales;


class SalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view()
    {
        return view('outlet.viewsales');
    }
    public function add()
    {
        return view('outlet.addsales');
    }
    public function addPost(Request $request)
    {
        return view('outlet.viewsales');
    }}
