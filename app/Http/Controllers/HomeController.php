<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $highlights = News::where('region_id', 1)->orderBy('created_at', 'desc')->paginate(4);
        $southlate = News::where('region_id', 1)->latest()->first();
        $nationallate = News::where('region_id', 2)->latest()->first();
        $internationallate = News::where('region_id', 3)->latest()->first();
        $southskip = News::where('region_id', 1)->orderBy('created_at', 'desc')->skip(1)->take(2)->get();
        $carousel = News::where('region_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $latestpolitics = News::where('category_id', 1)->latest()->first();
        $latestlifestyle = News::where('category_id', 4)->latest()->first();
        $latestsports = News::where('category_id', 3)->latest()->first();
        $latestbusiness = News::where('category_id', 2)->latest()->first();
        $politics = News::where('category_id', 1)->orderBy('created_at', 'desc')->skip(1)->take(4)->get();
        $lifestyle = News::where('category_id', 4)->orderBy('created_at', 'desc')->paginate(3);
        $sports = News::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        $business = News::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(4);

        return view('public/home', compact([
            'highlights',
            'southlate',
            'nationallate',
            'southskip',
            'internationallate',
            'carousel',
            'latestpolitics',
            'latestlifestyle',
            'latestsports',
            'latestbusiness',
            'politics',
            'lifestyle',
            'sports',
            'business',
        ]));
    }

    public function allSouth(Request $request)
    {
        $southeastern = News::where('region_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/news/southeastern/data', compact([
                'southeastern', 
                'authors',
            ]))->render();
            
            return response()->json(['html'=>$view]);
        }

        return view('public/news/southeastern/southeastern', compact('southeastern','authors',));
    }

    public function viewSouth($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $southnews = News::where('region_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/news/southeastern/view', [
            'southeastern' => $headline,
            'southnews' => $southnews,
            'authors' => $authors,
        ]);
    }

    public function allNational(Request $request)
    {
        $national = News::where('region_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/news/national/data', compact('national','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/news/national/national', compact('national','authors'));
    }

    public function viewNational($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $nationalnews = News::where('region_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/news/national/view', [
            'national' => $headline,
            'nationalnews' => $nationalnews,
            'authors' => $authors,
        ]);
    }

    public function allInternational(Request $request)
    {
        $international = News::where('region_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/news/international/data', compact('international','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/news/international/international', compact('international','authors'));
    }

    public function viewInternational($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $internationalnews = News::where('region_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/news/international/view', [
            'international' => $headline,
            'internationalnews' => $internationalnews,
            'authors' => $authors,
        ]);
    }

    public function allPolitics(Request $request)
    {
        $politics = News::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/categories/politics/data', compact('politics','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/categories/politics/politics', compact('politics','authors'));
    }

    public function viewPolitics($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $politicsnews = News::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/categories/politics/view', [
            'politics' => $headline,
            'politicsnews' => $politicsnews,
            'authors' => $authors,
        ]);
    }

    public function allBusiness(Request $request)
    {
        $business = News::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/categories/business/data', compact('business','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/categories/business/business', compact('business','authors'));
    }

    public function viewBusiness($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $businessnews = News::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/categories/business/view', [
            'business' => $headline,
            'businessnews' => $businessnews,
            'authors' => $authors,
        ]);
    }

    public function allSports(Request $request)
    {
        $sports = News::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/categories/sports/data', compact('sports','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/categories/sports/sports', compact('sports','authors'));
    }

    public function viewSports($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $sportsnews = News::where('category_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/categories/sports/view', [
            'sports' => $headline,
            'sportsnews' => $sportsnews,
            'authors' => $authors,
        ]);
    }

    public function allLifestyle(Request $request)
    {
        $lifestyle = News::where('category_id', 4)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/categories/lifestyle/data', compact('lifestyle','authors'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/categories/lifestyle/lifestyle', compact('lifestyle','authors'));
    }

    public function viewLifestyle($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $lifestylenews = News::where('category_id', 4)->orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/categories/lifestyle/view', [
            'lifestyle' => $headline,
            'lifestylenews' => $lifestylenews,
            'authors' => $authors,
        ]);
    }

    public function viewAuthor(Request $request, $first_name)
    {
        $first_name = User::where('first_name', $first_name)->first();
        $user_id = $first_name->id;
        $count = News::where('posted_by', $user_id)->count();
        $posts = News::where('posted_by', $user_id)->orderBy('created_at', 'desc')->paginate(20);

        if ($request->ajax()) {
            $view = view('public/author/data', compact('first_name','posts','count'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/author/author', compact('first_name','posts','count'));
    }

    public function filteredPosts(Request $request)
    {
        $search = $request->search;
        $posts = News::where('headline', 'like', '%'.$search.'%')
            ->orWhere('story', 'like', '%'.$search.'%')
            ->orWhere('story_one', 'like', '%'.$search.'%')
            ->orWhere('story_two', 'like', '%'.$search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $authors = User::all();

        if ($request->ajax()) {
            $view = view('public/posts/data', compact('authors','posts'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('public/posts/posts', compact('posts', 'authors'));
        
    }

    public function viewPosts($headline)
    {
        $headline = News::where('headline', $headline)->first();
        $posts = News::orderBy('created_at', 'desc')->paginate(6);
        $authors = User::all();
        
        return view('public/posts/view', [
            'posts' => $headline,
            'postnews' => $posts,
            'authors' => $authors,
        ]);
    }
}
