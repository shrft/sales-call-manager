<?php

namespace App\Http\Controllers;

use App\CallList;
use Illuminate\Http\Request;

class CallListController extends Controller
{
    public function index(Request $request){
        $filter = $request->get('filter','ready');

        $perPage = 20;
        if($filter === 'all'){
            $callList = CallList::paginate($perPage);
        }else{
            $callList = CallList::where('status', $filter)->paginate($perPage);
        }

        return view('call_list.index')->with('callList', $callList);
    }
    public function detail(Request $request, $id){
        $callList = CallList::findOrFail($id);
        return view('call_list.detail')->with('callList', $callList);
    }
}
