<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        $regions = Region::get();
        return view('admin/news',[
            'categories' => $categories,
            'regions' => $regions,
        ]);
    }

    public function store(Request $request)
    {
        $files =[];
        if ($request->file('image')) $files[] = $request->file('image');
        if ($request->file('image_one')) $files[] = $request->file('image_one');

        foreach ($files as $file) {
            if(!empty($file)){
                $filenames[] = $file->getClientOriginalName();
                $file->move(storage_path('app/public/posts/'), end($filenames));
            }
        }
        
        // $save->image1 = $filenames[0];
        // $save->image2 = $filenames[1];
        // $save->image3 = $filenames[2];

        // $img_name = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('storage/posts/'), $img_name);
        // $imagePath = 'storage/posts/'.$img_name;
        // $img_name_one = time().'.'.$request->image_one->getClientOriginalExtension();
        // $request->image_one->move(public_path('storage/posts/'), $img_name_one);
        // $imagePath_One = 'storage/posts/'.$img_name_one; 

        $data = [
            'headline'=>$request->headline,
            'image'=>$filenames[0],
            'caption'=>$request->caption,
            'story'=>$request->story,
            'region_id'=>$request->region_id,
            'category_id'=>$request->category_id,
            'image_one'=>$filenames[1],
            'caption_one'=>$request->caption_one,
            'story_one'=>$request->story_one,
            'url'=>$request->url,
            'story_two'=>$request->story_two,
            'posted_by' => Auth::user()->id,           
        ]; 
        $add = News::create($data); 
        if($add){
            $response['success'] = true;
            $response['message'] = 'Success! Record Added Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Record Not Added.';
        }
        return $response; 
      
    }

    public function anyData(Request $request)
    {
        $news = DB::table('news')
            ->join('regions','regions.id', '=', 'news.region_id')
            ->join('categories','categories.id', '=', 'news.category_id')
            ->select('news.*', 'regions.name', 'categories.slug')
            ->when(isset($request->filter_region), function ($q) use ($request) {
                $q->where('region_id', $request->filter_region);
            })
            ->when(isset($request->filter_category), function ($q) use ($request) {
                $q->where('category_id', $request->filter_category);
            })
            ->get();
        return DataTables::of($news)
            ->addColumn('action', function ($news) {
                return '
                <a href="#edit-'.$news->id.'" class="btn btn-sm btn-primary  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"" onclick="edit_news(' . "'" . $news->id . "'" . ')"><i class="mdi mdi-pencil-outline" ></i></a>
                <a href="#delete-'.$news->id.'" class="btn btn-sm btn-danger  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"" onclick="delete_appdata(' . "'" . $news->id . "'" . ')"><i class="mdi mdi-delete-empty" ></i></a>';
            })
            ->make(true);
    }

    public function show($id)
    {
        $data = News::Where('id', $id)
            ->get();

        return json_encode($data);
    }

    public function update(Request $request, $id)
    {
        $edit = News::where('id', $id)
            ->update([
                'headline' =>  $request->headline,
                'caption' =>  $request->caption,
                'story' =>  $request->story,
                'region_id' => $request->region_id,
                'category_id' => $request->category_id,
                'caption_one' =>  $request->caption_one,
                'story_one' =>  $request->story_one,
                'url' =>  $request->url,
                'story_two' =>  $request->story_two,
            ]);
        return response()->json($edit);

    }

    public function destroy($id)
    {
        $data = News::where('id', $id)->delete();
        return response()->json($data);
    }

    public function phpInfo()
    {
        phpinfo();
    }

}
