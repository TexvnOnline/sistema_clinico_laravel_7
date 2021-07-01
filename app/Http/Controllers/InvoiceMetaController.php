<?php

namespace App\Http\Controllers;

use App\InvoiceMeta;
use Illuminate\Http\Request;

class InvoiceMetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(InvoiceMeta $invoiceMeta)
    {
        //
    }
    public function edit(InvoiceMeta $invoiceMeta)
    {
        //
    }
    public function update(Request $request, InvoiceMeta $invoiceMeta)
    {
        //
    }
    public function destroy(InvoiceMeta $invoiceMeta)
    {
        //
    }
}
