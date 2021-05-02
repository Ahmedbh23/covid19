<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Health_info;

class Health_infosController extends Controller
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
        return view('shealth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shealth.create');
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
            'diseases' => 'required',
            'nbr_dis' => 'required',
            'age' => 'required'
        ]);

        $user_id = auth()->user()->id;

        $check = Health_info::where('User_id', $user_id)->get();
        if(count($check)){
            return redirect('/')->with('error', 'Sorry, you make a File with your personal informations Once');
        }

        

        
        // Creating Health information File for the user
        $health = new Health_info;
        $health->diseases = $request->input('diseases');
        $health->nbr_diseases = $request->input('nbr_dis');
        $health->age = $request->input('age');
        $health->user_id = $user_id;
        $health->state_id = 3;
        $health->save();
        return redirect('/info_me')->with('success', 'The Health_informations File  have been Created Successfuly');

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
