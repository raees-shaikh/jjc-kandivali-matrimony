<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $profiles = User::where('gender', '!=', $user->gender)->whereStatus('Approved')->where('id', '!=', $user->id)->latest()->whereHas('subscriptions', function (Builder $query) {
            $query->where('is_active', 1)->where('end_date', '>', now());
        });
        // $profiles = User::whereStatus('Approved')->where('id', '!=', $user->id)->inRandomOrder();
        // dd($profiles->toSql());
        $this->filterResults($request, $profiles);
        $profiles = $profiles->simplePaginate(12);
        // dd($profiles);
        return view('frontend.search', compact('profiles'));
    }

    protected function filterResults($request, $profiles)
    {


        if ($request !== null && $request->has('mother_tongue') && $request['mother_tongue'] != null && $request['mother_tongue'] !== '') {
            // dd(1, $request->mother_tongue);
            $profiles = $profiles->where('mother_tongue', $request->mother_tongue);
        }

        if ($request !== null && $request->has('caste') && $request['caste'] != null && $request['caste'] !== '') {
            // dd(2, $request->caste);
            $profiles = $profiles->where('caste', 'LIKE', '%' . $request['caste'] . '%');
        }

        if ($request !== null && $request->has('name') && $request->name != null && $request->name !== '') {
            // dd('ghfd');
            // dd(3, $request['name']);
            $search = $request['name'];
            $profiles = $profiles->where(function ($query) use ($search) {
                $query->where('full_name', 'LIKE', '%' . $search . '%')->orWhere('profile_no', 'LIKE', '%' . $search . '%');
            });
        }

        if ($request !== null && $request->has('max_age')  && $request->has('min_age') && $request['max_age'] != null && $request['min_age'] != null && $request['max_age'] !== '' && $request['min_age'] !== '') {
            $validator = Validator::make($request->all(), [
                'max_age' => 'nullable|numeric|min:18|max:100',
                'min_age' => 'nullable|numeric|min:18|max:100'
            ]);
            if ($validator->fails()) {
                return redirect()->route('frontend.search')->with(toast('The Given Age Is Not Valid.'));
            }
            $minDate = Carbon::today()->subYears($request->max_age + 1)->startOfDay()->toDateTimeString();
            $maxDate = Carbon::today()->subYears($request->min_age)->endOfDay()->toDateTimeString();

            // dd($minDate, $maxDate);
            $profiles = $profiles->whereBetween('date_of_birth', [$minDate, $maxDate]);
            // dd($profiles);
        }

        //dd($profiles->toSql());

        // return $profiles;
    }
}
