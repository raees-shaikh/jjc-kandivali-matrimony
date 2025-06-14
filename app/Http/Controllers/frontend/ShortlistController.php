<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Shortlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ShortlistController extends Controller
{

    public function index()
    {
        $shortlists = auth()->user()->shortlists()->with('shortlistedUser')->latest()->simplePaginate(12);
        // dd(auth()->user()->shortlists()->with('shortlistedUser')->latest()->get());
        return view('frontend.shortlist.index', compact('shortlists'));
    }

    public function shortlist(Request $request)
    {
        $user = auth()->user();
        $shortlist_user = User::where('gender', '!=', $user->gender)->whereStatus('Approved')->where('id', '!=', $user->id)->whereHas('subscriptions', function (Builder $query) {
            $query->where('is_active', 1)->where('end_date', '>', now());
        })->find($request->shortlist_id);
        // dd($shortlist_user);
        if ($shortlist_user) {
            $shortlist = $user->shortlists()->where('shortlisted_id', $request->shortlist_id)->first();
            if ($shortlist) {
                if ($shortlist->delete()) {
                    // return redirect()->back()->with(toast('Profile Un-Shortlisted', 'success'));
                    return response()->json(['status' => true, 'shortlist' => 0, 'message' => 'Profile Un-Shortlisted']);
                }
            } else {
                $shortlist = new Shortlist();
                $shortlist->user_id = $user->id;
                $shortlist->shortlisted_id = $request->shortlist_id;
                if ($shortlist->save()) {
                    // return redirect()->back()->with(toast('Profile Shortlisted', 'success'));
                    return response()->json(['status' => true, 'shortlist' => 1, 'message' => 'Profile Shortlisted']);
                }
            }
        }
        // return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
    }
}
