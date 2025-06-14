<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Reference\Reference;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('frontend.profile', compact('user'));
    }

    public function show()
    {
        $user = auth()->user();
        $referenceOne = $user->userReference->where('type', 'reference_one')->first();
        $referenceTwo = $user->userReference->where('type', 'reference_two')->first();
        //dd($referenceOne);
        return view('frontend.profile.show', compact('user', 'referenceOne', 'referenceTwo'));
    }

    public function showOtherProfile($profile_no)
    {
        $user = User::where('id', '!=', auth()->user()->id)->where('profile_no', $profile_no)->firstOrFail();
        $referenceOne = $user->userReference->where('type', 'reference_one')->first();
        $referenceTwo = $user->userReference->where('type', 'reference_two')->first();
        //dd($referenceOne);
        return view('frontend.profile.show', compact('user', 'referenceOne', 'referenceTwo'));
    }

    public function uploadMoreImages(Request $request)
    {
        // dd($request);
        $request->validate([
            'images' => 'required|max:4',
            'images.*' => 'required|file|max:10240|mimes:png,jpeg,jpg',
        ], [
            'images.*' => 'Required: File Type - jpg/jpeg/png, Max Size - 10 MB per image'
        ], [
            'images.*' => 'Images'
        ]);
        $user = auth()->user();
        // dd($user->images->count(), count($request->file('images')));
        if ($user->images->count() + count($request->file('images')) > 4) {
            return redirect()->back()->with(toast('Max 4 Images Allowed'));
        }

        foreach ($request->file('images') as $file) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $file->clientExtension();
            $destinationPath = storage_path('app/public/images/');
            $img = Image::make($file->getRealPath())->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 90);

            Media::create([
                'name' => 'images',
                'model_type' => User::class,
                'model_id' => $user->id,
                'type' => 'image',
                'filename' => $filename
            ]);
        }

        return redirect()->back()->with(toast('Images Uploaded Successfully', 'success'));
    }

    public function deleteImage($media_id)
    {
        $user = auth()->user();
        $media = $user->images()->findOrFail($media_id);
        if ($media->delete() &&  Storage::disk('public')->delete('images/' . $media->filename)) {
            return redirect()->route('frontend.profile')->with(['alert-type' => 'success', 'message' => 'Image Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
