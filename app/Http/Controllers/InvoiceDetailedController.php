<?php

namespace App\Http\Controllers;

use App\Models\BookingSchedule;
use App\Models\InvoiceDetailed;
use App\Http\Requests\StoreInvoiceDetailedRequest;
use App\Http\Requests\UpdateInvoiceDetailedRequest;

class InvoiceDetailedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obj  = new InvoiceDetailed();
        // Goi den funtion index o trong mpdels de lay du lieu
        $invoicedetails= $obj->index();
        // Tra ve view va gui du lieu lay dc
        return view('invoicedetail.index', ['invoicedetails' => $invoicedetails]);
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
     * @param  \App\Http\Requests\StoreInvoiceDetailedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceDetailedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceDetailed  $invoiceDetailed
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceDetailed $invoiceDetailed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceDetailed  $invoiceDetailed
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceDetailed $invoiceDetailed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceDetailedRequest  $request
     * @param  \App\Models\InvoiceDetailed  $invoiceDetailed
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceDetailedRequest $request, InvoiceDetailed $invoiceDetailed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceDetailed  $invoiceDetailed
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceDetailed $invoiceDetailed)
    {
        //
    }

}
