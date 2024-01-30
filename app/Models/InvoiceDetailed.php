<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvoiceDetailed extends Model
{
    use HasFactory;
    protected $table = 'invoice_detaileds';

    public function index(){
        // Query lay du lieu
        $invoicedetails = DB::table('invoice_detaileds')
            ->join('rooms', 'invoice_detaileds.room_id', '=', 'rooms.id')
            ->select('invoice_detaileds.*','rooms.name as room_name')
            ->get();
        // Tra ve du lieu
        return $invoicedetails;
    }
}
