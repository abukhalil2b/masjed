<?php

namespace App\Http\Controllers;

use App\Models\Wakeel;
use Illuminate\Http\Request;

class WakeelController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wakeel  $wakeel
     * @return \Illuminate\Http\Response
     */
    public function show(Wakeel $wakeel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wakeel  $wakeel
     * @return \Illuminate\Http\Response
     */
    public function edit(Wakeel $wakeel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wakeel  $wakeel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wakeel $wakeel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wakeel  $wakeel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wakeel $wakeel)
    {
        //
    }
}
