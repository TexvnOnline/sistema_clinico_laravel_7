<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
    public function show(Invoice $invoice)
    {
        //
    }
    public function edit(Invoice $invoice)
    {
        //
    }
    public function update(Request $request, Invoice $invoice)
    {
        //
    }
    public function destroy(Invoice $invoice)
    {
        //
    }
}
