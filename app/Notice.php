<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
  public $table = "notice";
  public function searchGetResult(Request $request){
     $data = $request->get('title');
     $titleQuery = Notice::where('title','LIKE','%'.$data.'%')->get();
     return Response::json([
          'data' => $titleQuery
     ]);
  }
}
