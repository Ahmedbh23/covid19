<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $title ='Posts';
        $user_id = auth()->user()->id;
        $contact = Contact::where('User_id', $user_id)->get();

        $length = count($contact);
        return view('scontact.index', compact('title', 'contact', 'length'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $title = 'Contact Page';

        return view('scontact.create', compact('title'));
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
            'title' => 'required',
            'body' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $title = $request->input('title');
        $body = $request->input('body');

        $contact = Contact::where('User_id', $user_id)->get();
        
        if(count($contact) > 5){
            return redirect('/')->with('error', 'Sorry, you cannot write more than 6 Posts');
        }

        $bad_words = array("Fuck", "Fuck you", "Shit", "Piss off", "Dick head", "Asshole",
                        "Son of a bitch", "Bastard", "Bitch", "Damn", " Taking the piss",
                        "Bloody Oath", "Get Stuffed", "Bugger me", "Fair suck of the sav"
        );

        foreach($bad_words as $bad){
            if (strpos(strtolower($body), strtolower($bad)) !== false) {
                return redirect('/contact/create')->with('error', "We Don't use bad words here !!!");  
            }
        }


        $post = new Contact;
        $post->title = $title;
        $post->body = $body;
        $post->user_id = $user_id;
        $post->save();
        return redirect('/contact/create')->with('success', 'Post Created Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('scontact.show')->with('contact', $contact);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Post';
        $contact = Contact::find($id);
        return view('scontact.edit',compact('title', 'contact'));
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $user_id = auth()->user()->id;

        $post = Contact::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = $user_id;
        $post->save();
        return redirect('/contact')->with('success', 'Post Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/contact')->with('success', 'Post Deleted Successfuly');
    }
}
