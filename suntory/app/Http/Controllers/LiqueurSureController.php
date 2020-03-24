<?php

namespace App\Http\Controllers;

use App\Liqueur;
use App\LiqueurSure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LiqueurSureController extends Controller
{
    public function index()
    {
        $data = LiqueurSure::all();
        return view('auth.liqueur_Sure.index', compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $ready = LiqueurSure::create($data);
        $data = LiqueurSure::with('liqueur')->where('id', $ready->id)->first();
        return $data;
    }
    public function liqueurSure_upload_img()
    {
        // A list of permitted file extensions
        $allowed = array('png', 'jpg', 'gif','zip');
        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $allowed)){
                echo '{"status":"error"}';
                exit;
            }
            $name = strval(time().md5(rand(100, 200)));
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[count($ext)-1];
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if( ! is_dir('upload/')){
                mkdir('upload/');
            }
            //防呆：資料夾不存在時將會自動建立資料夾，避免錯誤
            if ( ! is_dir('upload/SureImg')) {
                mkdir('upload/SureImg');
            }
            $destination = public_path().'/upload/SureImg/'. $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo "/upload/SureImg/".$filename;//change this URL
        }
        exit;
    }

    public function liqueurSure_delete_img(Request $request)
    {
        if(file_exists(public_path().$request->file_link)){
            File::delete(public_path().$request->file_link);
        }
        return $request;
    }

    public function liqueurSure_kind()
    {
        $data = Liqueur::all();
        return $data;
    }

    public function liqueurSure_text()
    {
        $data = LiqueurSure::with('liqueur')->get();
        return $data;
    }
}
