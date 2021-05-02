<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\Test;
use App\Models\Health_info;

class VaccinesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('svaccines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_vacc' => 'required'
        ]);

        $user_id = auth()->user()->id;

        $vaccine = Vaccine::where('User_id', $user_id)->get();
        if(count($vaccine)){
            return redirect('/')->with('error', 'Sorry, you make a Vaccination appointment Once');
        }
        
        $health_file = Health_info::where('User_id', $user_id)->get();
        $check_test = Test::where('User_id', $user_id)->get('lab_id');
        $lab = $check_test[0]['lab_id'];
        if(count($check_test) == 0){
            return redirect('/tests')->with('error', 'Sorry, Make a Test than you can Take Date to Vaccine');
        }elseif(count($health_file) == 0){
            return redirect('/info_me/create')->with('error', 'Sorry, Make a Health_infos File first');
        }
        
        foreach($health_file as $file){
            if (!($file['nbr_diseases'] > 0 || age > 40)){
                return redirect('/vaccines/create')->with('error', 'Sorry, Please wait until the second vertilization period comes');
            }
        }



        //create Vaccine
        
        $vaccin = new Vaccine;
        $vaccin->prix = 500;
        $vaccin->vaccinate_at = $request->input('date_vacc');
        $vaccin->lab_id = $lab;
        $vaccin->User_id = $user_id;
        $vaccin->save();

        return redirect('/vaccines/create')->with('success', 'Vaccine appointment Created Successfuly');

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
