<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
  public function index()
  {
    $subscriptions = Subscription::latest()->paginate(10);
    return view('backend.subscription.index',compact('subscriptions'));
  }
}
