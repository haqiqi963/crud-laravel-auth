<?php

namespace App\Http\Controllers;



use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }
    public function fetchAll()
    {
        $posts = Post::all();
        $output = '';
        if($posts->count() > 0){
            $output .= '<table class="table table-striped table-bordered align-middle" id="tablePost">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($posts as $post => $value){
                $output .= '<tr>
                <td>' . $no++ . '</td>
                <td>' . $value->title . '</td>
                <td>' . $value->content . '</td>
                <td><img src="storage/image/' . $value->image . '" width="50"></td>
                <td>';

                // Check if the role_id is 1 before showing the links
                if (Auth::check() && Auth::user()->role_id == 1) {
                    $output .= '<a href="#" id="' . $value->id . '" class="text-success mx-1 editData" data-bs-toggle="modal" data-bs-target="#editPostModal"><i class="bi-pencil-square h4"></i></a>
                <a href="#" id="' . $value->id . '" class="text-danger mx-1 deleteData"><i class="bi-trash h4"></i></a>';
                }

                $output .= '</td>
                </tr>';
            }

            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Tidak Ada Data</h1>';
        }
    }

    public function store(Request $request)
    {
        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;

            // menyimpan gambar ke dir image
            $request->file('image')->storeAs('image', $newName);
        }

        $postData = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newName,
        ];
        Post::create($postData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update(Request $request)
    {
        $newName = '';
        $posts = Post::find($request->post_id);
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            // menyimpan gambar ke dir image
            $request->file('image')->storeAs('image', $newName);
            if($posts->image){
                Storage::delete('image/'. $posts->image);
            }
        } else {
            $newName = $request->post_img;
        }

        $postData = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newName
        ];
        $posts->update($postData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $posts = Post::find($id);
        if(Storage::delete('image/' . $posts->image)){
            Post::destroy($id);
        }
    }

}
