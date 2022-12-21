<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $count = News::where('posted_by', $id)->count();

        return view('admin/profile/profile', compact('count'));
    }

    public function picIndex()
    {
        return view('admin/profile/profilepic');
    }

    public function show($id)
    {
        $data = User::Where('id', $id)
            ->get();

        return json_encode($data);
    }

    public function update(Request $request, $id)
    {
        $edit = User::where('id', $id)
            ->update([
                'first_name' =>  $request->first_name,
                'last_name' =>  $request->last_name,
                'email' =>  $request->email,
                'contact' =>  $request->contact,
                'address' =>  $request->address,
                'bio' =>  $request->bio,
            ]);
        return response()->json($edit);
    }

    public function update_image(Request $request){
        $img_name = 'storage/profiles_'.time().'.'.$request->profile->getClientOriginalExtension();
        $request->profile->move(public_path('storage/profiles/'), $img_name);
        $imagePath = 'storage/profiles/'.$img_name;
        $data = [
            'profile_image'=>$imagePath,
        ]; 
        $update = User::find($request->id)->update($data); 
        if($update){
            $response['success'] = true;
            $response['message'] = 'Success! Record Updated Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Record Not Updated.';
        }
        return $response;
    }

    public function phpInfo()
    {
        phpinfo();
    }

}
