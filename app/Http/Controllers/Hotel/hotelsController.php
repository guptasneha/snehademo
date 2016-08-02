<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Hotel;
use App\comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;
use App\Hotel;

class hotelsController extends Controller {

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /********************* Add Hotel *****************/
     
    public function add_hotel(Request $req){
        $name = $req->name;
        $address = $req->address;
        $price = $req->price;

        $inputs = [
            'name'        => $name,
            'address'     => $address,
            'price'       => $price,
        ];

        $rules = [
            'name'        => 'required',
            'address'     => 'required',
            'price'       => 'required|numeric',

        ];

        
        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $hotel = new Hotel;

        $hotel->name = $name;
        $hotel->address = $address;
        $hotel->price = $price;

        $hotel->save();

        return redirect()->back()->withInput()->with('message', 'Hotel Added.' );
    }

    /********************* Post Comment *****************/
    public function post_comment(Request $req){
        $description = $req->description;
        $hotel_id    = $req->hotel_id;

        $inputs = [
            'description'   => $description,
           
        ];

        $rules = [
            'description'   => 'required',
    
        ];

        
        $validation = Validator::make($inputs, $rules);

        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }

        $comment = new Comment;
        $comment->description = $description;
        $comment->hotel_id = $hotel_id;

        $comment->save();

        return redirect()->back()->withInput()->with('message', 'Comment Added.' );
    }
 
     
    
}
?>