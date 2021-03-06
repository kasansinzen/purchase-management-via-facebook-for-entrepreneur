<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use Illuminate\Support\Facades\Storage;
use File;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newss = NewsModel::paginate(10);

        return view('store.admin.news-management.index-news-management')
            ->with('newss', $newss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.admin.news-management.create-news-management');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = NewsModel::find($id);

        return view('store.user.news.show-news')
            ->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsModel::find($id);

        return view('store.admin.news-management.edit-news-management')
            ->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = NewsModel::find($id);

        if($request['news_picture']){
            $imageName = time().'.'.$request->news_picture->getClientOriginalExtension();
            $request->news_picture->move(public_path('images/news'), $imageName);
            $path = '/images/news/'. $imageName;
            $news->news_picture = $path;
        }

        $news->news_header = $request['news_header'];
        $news->news_content = $request['news_content'];
        $news->save();

        return redirect('store/admin/news-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = NewsModel::find($id);
        $news->delete();

        return redirect('store/admin/news-management');
    }
}
