<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Hotel;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Validator;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // auth middleware
        $this->middleware('auth');
    }
	

	/******** if user id is 1 then show hotel add page other wise return to home page ********/ 
	
	
    public function index()
    {
        // get logged in user id
        $id = Auth::id();
        // check condition user logged with user id ==1 .
        if($id == 1)
        {
            //if true then adding hotel
            return view('addhotel');
        }
        else
        {
            //other wise return to home page
            return redirect('');
        }      
    }

    
    /************** save hotel information in hotels table *****************/
	
     
    public function addHotel(Request $request)
    {
        
        // setting up rules
        $rules = array(
        'hotelname' => 'required',
        'address'   => 'required',
        'price'     => 'required|numeric'
        ); 
        // get image name (hotelname.attachmentname) with extension
        if($request->file('hotelimage')!='')
        {
            $imageName =  $request->get('name'). '.' . 
            $request->file('hotelimage')->getClientOriginalName();
            // all hotel image save in public/hotelimage/thumbnail floder
            $request->file('hotelimage')->move(base_path() . '/public/hotelimage/thumbnail/', $imageName );
        }
        else
        {
            $imageName = '';
        }
        // get all input values
        $data = array(
        'hotelname' => $request->get('name'),
        'address'   => $request->get('address'),
        'price'     => $request->get('price')
        );

        // check the validation
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // if fail then return back to the same page with the input data and errors message.
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            // if true then getting all information in an array. 
            $hotel = new Hotel(array(
            'hotelName'     => $request->get('name'),
            'hotelAddress'  => $request->get('address'),
            'hotelPrice'    => $request->get('price'),
            'hotelImage'    => $imageName
            ));
            //save into databse
            $hotel->save();
            //return to home page
            return redirect('');
        }
    }
//------------------------------------------------------------------------------------------------//     
}