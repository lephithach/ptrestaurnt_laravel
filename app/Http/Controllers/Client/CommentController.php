<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonAnCommentModel;
use App\Models\MonAnModel;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request()->input('id');
        $get = MonAnCommentModel::with('sdt')
                ->where(['mamon' => $id, 'hienthi' => '0'])
                ->orderBy('created_at', 'desc')
                ->get(['comment', 'id_comment', 'created_at', 'sdt'])
                ->toArray();

        return $get;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'commentText' => ['required', 'min:10'],
        ], [
            'commentText.required' => 'Vui lòng viết bình luận',
            'commentText.min' => 'Bình luận không được ngắn hơn :min ký tự',
        ]);

        if(Session::has('userClient')) {
            $sdt = Session::get('userClient')[0]['sdt'];
            $mamon = $request->IDMonAn;
            $comment = $request->commentText;

            $result = MonAnCommentModel::insert([
                'mamon' => $mamon,
                'sdt' => $sdt,
                'comment' => $comment,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            if($result) {
                return [
                    'status' => 'success',
                    'message' => 'Thêm bình luận thành công'
                ];
            } else {
                return [
                    'status' => 'danger',
                    'message' => 'Error',
                ];
            }
        }
        
        // $request->session()->has('key');

        

        // return $validate;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
