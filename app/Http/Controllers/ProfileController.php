<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Models\Site;
use App\Models\User;
use App\Models\Image;
use App\Models\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    // Show index page
    public function index(Site $site){
        return view('profile.index', [
            'photos' => $site->getPhotos(),
            'active_nav' => 'profile',
            'meta' => [
                'title' => 'Profile'
            ]
        ]);
    }

    // Upload lens image
    public function uploadLensImage(Request $request, Site $site){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=320,min_height=320'
        ]);
        $lens = Lens::where('hex', $request->hex)->first();
        if($request->hasFile('image')){
            $lens->image = $site->savePhoto($request, 'lenses', $request->hex);
        }
        $lens->save();
        return redirect('lenses')->with('message', 'Your lens was added.');
    }

    // Upload camera image
    public function uploadCameraImage(Request $request, Site $site){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=320,min_height=320'
        ]);
        $camera = Camera::where('hex', $request->hex)->first();
        if($request->hasFile('image')){
            $camera->image = $site->savePhoto($request, 'cameras', $request->hex);
        }
        $camera->save();
        return redirect('cameras/'.$camera->brand->slug.'-'.$camera->slug.'/'.$camera->hex)->with('message', 'Your camera was added.');
    }

    // Show edit profile picture
    public function editProfilePicture(){
        $user = User::find(auth()->user()->id)->first();

        return view('profile.edit-profile-picture', [
            'user' => $user,
            'active_nav' => 'profile',
            'meta' => [
                'title' => 'Profile'
            ]
        ]);
    }

    // Upload profile picture
    public function uploadProfilePicture(Request $request, Site $site){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048|dimensions:min_width=320,min_height=320'
        ]);
        $user = User::where('hex', $request->hex)->first();
        if($request->hasFile('image')){
            if(!File::exists(public_path('images/users/'.$request->hex))) {
                File::cleanDirectory(public_path('images/users/'.$request->hex));
            }
            $user->image = $site->savePhoto($request, 'users', $request->hex);
        }
        $user->save();
        return redirect('profile/picture')->with('message', 'Your profile picture has been updated.');
    }

    // Show edit settings
    public function editSettings(){
        $user = User::find(auth()->user()->id)->first();
        return view('profile.edit-settings', [
            'user' => $user,
            'active_nav' => 'profile',
            'meta' => [
                'title' => 'Profile'
            ]
        ]);
    }

    // Show edit password
    public function editPassword(){
        $user = User::find(auth()->user()->id)->first();
        return view('profile.edit-password', [
            'user' => $user,
            'active_nav' => 'profile',
            'meta' => [
                'title' => 'Profile'
            ]
        ]);
    }

    // Update password
    public function updatePassword(Request $request){
        // Validate form data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Attempt login with username
        if(auth()->attempt([
            'username' => auth()->user()->username,
            'password' => $request->old_password
        ])){
            $user = User::where('hex', $request->hex)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            $request->session()->regenerate();
            return redirect('/profile')->with('message', 'Your password was updated.');
        }
        
        // Or reject login attempt
        else{
            return back()->withErrors(['old_password' => 'Your old password is not correct.'])->onlyInput('old_password');
        }
    }

}
