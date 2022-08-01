<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\AuthorRepository;
use App\Models\Author; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class AuthorController extends Controller
{
    protected $author;

    public function __construct(Author $author){
        $this->author             = new AuthorRepository($author); 
    }

    public function index(){
        return view("admin.manager.author");
    }
    public function get(){
        $data = $this->author->get_data();
        return $this->author->send_response(201, $data, null);
    }
    public function get_one($id){
        $data = $this->author->get_one($id);
        return $this->author->send_response(200, $data, null);
    }
 
    public function store(Request $request){   
        $data = [ 
            "avatar"            => $this->author->imageInventor('image-upload', $request->data_image, 600),  
            "name"              => $request->data_name,  
            "description"       => nl2br($request->data_description),   
        ];
        $data_create = $this->author->create($data); 
        return $this->author->send_response("Create successful", $data_create, 201);
    }
    public function update(Request $request){   
        $data = [  
            "name"              => $request->data_name,  
            "description"       => nl2br($request->data_description),   
        ]; 
        if ($request->data_image != "null") {  
            $data["avatar"] = $this->author->imageInventor('image-upload', $request->data_image, 600);
        }
        $data_update = $this->author->update($data, $request->data_id);
        return $this->author->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->author->delete($id); 
        return $this->author->send_response("Delete successful", null, 200);
    }
}
