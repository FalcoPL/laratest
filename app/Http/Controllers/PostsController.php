<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
                        -> where('draft', 0)
                        -> orderBy('created_at', 'desc')
                        -> paginate(4);

        if (isset($_GET['category'])) {
            $id = Input::get('category');

            $posts = DB::table('posts')
                            -> where('draft', 0)
                            -> where('category', $id)
                            -> orderBy('created_at', 'desc')
                            -> paginate(4);
        }
        

        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required|string|max:255|min:3',
            'content' => 'required'
        ]);

        if ($request -> draft != 1) {
            $request -> draft = 0;
        }

        // save
            $id = DB::table('posts')
                        -> insertGetId(
                                [
                                    'title' => $request -> title,
                                    'content' => $request -> content,
                                    'draft' => $request -> draft,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                ]
                            );

            // upload
                if ($request -> file('thumbnail')) {
                    $upload_path        =   'public/thumbnails/' . $id;
                    $path               =   $request -> file('thumbnail') -> store($upload_path);
                    
                    $thumbnail_filename    =   str_replace($upload_path.'/', '', $path);

                    // echo $thumbnail_filename;

                    DB::table('posts')
                            -> where('id', $id)
                            -> update(
                                    [
                                        'thumbnail' => asset('storage/thumbnails/'.$id.'/'.$thumbnail_filename),
                                    ]
                                );
                }

        //go back
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::table('posts') 
                        -> where('id', $id) 
                        -> where('draft', 0) 
                        -> get();

        return view('post', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DB::table('posts') -> where('id', '=', $id) -> get();

        $post = $post[0];
        return view('admin.edit', compact('post'));
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
        if ($request -> draft == 1) {
            DB::table('posts')
                    -> where('id', $id)
                    -> update(
                            [
                                'draft' => 0,
                            ]
                        );
        //go back
            return back();
        }
        
            $this -> validate($request, [
                'title' => 'required|string|max:255|min:3',
                'content' => 'required'
            ]);


        // save
            DB::table('posts')
                        -> where('id', $id)
                        -> update(
                                [
                                    'title' => $request -> title,
                                    'content' => $request -> content,
                                    'category' => $request -> category,
                                ]
                            );

            // upload
                if ($request -> file('thumbnail')) {
                    $upload_path        =   'public/thumbnails/' . $id;
                    $path               =   $request -> file('thumbnail') -> store($upload_path);
                    
                    $thumbnail_filename    =   str_replace($upload_path.'/', '', $path);

                    // echo $thumbnail_filename;

                    DB::table('posts')
                            -> where('id', $id)
                            -> update(
                                    [
                                        'thumbnail' => asset('storage/thumbnails/'.$id.'/'.$thumbnail_filename),
                                    ]
                                );
                }

        //go back
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')
                    -> where('id', $id)
                    -> update(
                            [
                                'draft' => 1,
                            ]
                        );

        //go back
            return back();
    }
}
