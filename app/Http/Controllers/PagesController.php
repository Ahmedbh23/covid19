<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorie;
use App\Models\Vaccine;
use App\Models\Test;
use App\Models\Countrie;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(){
        $title = 'Home';
        return view('pages.index')->with($title, 'title');
    }

    public function about(){
        $title = 'about';
        $country = Countrie::where('name', 'Tunisia')->get();
        $prix_vac = Vaccine::where('prix', 500)->get('prix');
        $prix_test = Test::where('prix', 100 )->get('prix');
        $nbr_labos = Laboratorie::select('SELECT * FROM laboratories');
        $prix_test = $prix_test[0]['prix'];
        $prix_vac = $prix_vac[0]['prix'];
        $nbr_labos = $nbr_labos->count();

        return view('pages.about', compact('title', 'country', 'prix_vac', 'prix_test', 'nbr_labos'));
    }

    public function services(){
        $title = 'services';
        return view('pages.services', compact('title'));
    }
}