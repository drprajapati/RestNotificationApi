<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Model\Notice;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;
use App\Http\Resources\Notice as NoticeResource;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $notices = Notice::latest('id')->get();

        return response()->json($notices);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return NoticeResource
     */
    public function store(Request $request)
    {
        $notice = $request->isMethod('put') ? Notice::findOrFail($request->id) : new Notice();
        $notice->id = $request->input('id');
        $notice->uid = $request->input('uid');
        $notice->notice_creator = $request->input('notice_creator');
        $notice->category = $request->input('category');
        $notice->title = $request->input('title');
        $notice->content = $request->input('content');

        if ($notice->save()) {
            return new NoticeResource($notice);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Notice $notice
     * @return NoticeResource
     */
    public function show($id)
    {
        //Get notices
        $notices = Notice::findOrFail($id);

        //return one notice
        return new NoticeResource($notices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Notice $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Notice $notice
     * @return NoticeResource
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        if ($notice->delete()) {
            return new NoticeResource($notice);

        }
    }
    public function searchGetResult(Request $request){

      $data = $request->get('title');
      $search_title = DB::table('notice')->where('title','like',"%{$data}%")->get();
      return response()->json($search_title);
    }

}
