<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contacts_Logs;
use Inertia\Inertia;
class Contacts_LogsController extends Controller
{
    //
    public function get()
    {
        $data = new Contacts_Logs();
        //
        return Inertia::render('Log',['datacsv'=>$data::where('user_id',Auth::user()->id)->get()]);
    }
}
