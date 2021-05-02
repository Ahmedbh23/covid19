<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorie;
use App\Models\Health_info;
use App\Models\Test;


class TestsController extends Controller
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
        return view('stest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stest.create');
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
            'test_res' => 'required',
            'labo' => 'required',
            'date_test' => 'required'
        ]);

        //after authenication user cannot have two tests
        
        /*
        $id = auth($id);
        $state_id = Health_info::where('user_id', $id)->get('state_id');
        
        $state = State::where('id', $state_id)->get('name');
        
        if($labo == $state ){
            //
        }
        */

        $user_id = auth()->user()->id;

        $tests = Test::where('User_id', $user_id)->get();
        if(count($tests)){
            return redirect('/')->with('error', 'Sorry, you make a Test Once');
        }

        $result = $request->input('test_res');
        
        $date_test = $request->input('date_test');
        
        $labo = $request->input('labo');
        
        $tests = array("POSITIVE", "NEGATIVE");
        
        $laborat = array("energon testing lab", "reliascreen", "diagnostics wise",
                        "encore diagnostics", "realab diagnostics", "excelsior diagnostics",
                        "nexium laboratory services", "diagnosticsology", "resolution testing",
                        "onpoint diagnostic service", "ua value screens", "labplex diagnostics",
                        "westmore diagnostics", "Laboratoire de tunis");
        
        if ( !(in_array(strtoupper($result), $tests)) ){
            return redirect('/tests')->with('error', 'Sorry, the Test result must be " positive " or "negative"');
        }elseif ( !(in_array(strtolower($labo), $laborat)) ){
            return redirect('/tests')->with('error', 'Sorry, you must enter a Laboratory exists');
        }

        
        $labo_id = Laboratorie::where('name', $labo)->get('id');
        if(count($labo_id) > 0){
                $labo_id = $labo_id[0]['id'];
        }

        //update the Laboratory where the user take a test with nbr_test = nbr_test - 1;
        $nbr_tests = Laboratorie::where('id', $labo_id)->get('nbr_test');
        $nbr_tests =  $nbr_tests[0]['nbr_test'];
        Laboratorie::where('id', $labo_id)
            ->update(['nbr_test' => $nbr_tests-1]);

        //create test

        $test = new Test;
        $test->prix = 100;
        $test->test_result = $result;
        $test->tested_at = $date_test;
        $test->lab_id = $labo_id;
        $test->user_id = $user_id;
        $test->save();



        return redirect('/tests')->with('success', 'Test Created Successfuly');
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
