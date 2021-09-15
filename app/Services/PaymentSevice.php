<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{

  public function addpayment()
  {
    Payment::create([]);
  }

  public function getpayment($id)
  {
    Payment::find($id);
  }

  public function getpayments()
  {
    Payment::all();
  }
}
