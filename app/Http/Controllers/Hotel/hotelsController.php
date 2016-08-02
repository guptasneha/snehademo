<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Hotel;
use App\hotel;
use App\comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;

class hotelsController extends Controller {

    
     /********************* Display all hotels listing	*****************/
     
    public function index()
    {
        //getting all data from hotels table
        $hotels = hotel::all();
        //return result on the welcome blade page
        return view('welcome', compact('hotel'));
    }
 
     
     /*********************** Show all comments of hotel and return response ***************/
	 
	 
     
    public function showAllComments($id)
    {
        //find all comments as per Hotel id basics 
        $comments = hotel::find($id)->comments;
        $hotelid = $id;
        $hotelname = hotel::findOrFail($id);
        // show all comments listing on detail blade page
        return view('detail', compact('comments','hotelid','hotelname'));
    }

    
     /*********************** Post comment ******************/
    
    public function postComments(Request $request)
    {
         
         //create object of comment class
         $comment = new Comment;
         $comment->description = $request->input('body');
         $comment->hotel_id = $request->input('hotel_id');
         //save
         $comment->save();
         //return to the previous view
         return redirect()->back();
    }
  
}
?>