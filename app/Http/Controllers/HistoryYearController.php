<?php

namespace App\Http\Controllers;

use App\HistoryYear;
use Illuminate\Http\Request;

class HistoryYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $stories = HistoryYear::all()->sortBy('year');
        return view('history',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function react()
    {
        $fp = fopen('data.txt', 'w');
        fwrite($fp, 'response YES');
        fclose($fp);
        return "response YES";
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
     * @param  \App\HistoryYear  $historyYear
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryYear $historyYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoryYear  $historyYear
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryYear $historyYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoryYear  $historyYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryYear $historyYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoryYear  $historyYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryYear $historyYear)
    {
        //
    }
}
