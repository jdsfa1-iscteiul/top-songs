<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SongsController extends Controller
{
    function index(){

        $songs = DB::select("
            select
                * 
            from 
                songs
            where 
                songs.week = YEARWEEK(NOW())
            " 
        );
        return view('homepage', ['songs' => $songs]);
    }

    function oneweekago(){

        $songs = DB::select("
            select
                * 
            from 
                songs
            where 
                songs.week = (YEARWEEK(NOW())-1)
            " 
        );
        return view('oneweekago', ['songs' => $songs]);
    }

    function twoweeksago(){

        $songs = DB::select("
            select
                * 
            from 
                songs
            where 
                songs.week = (YEARWEEK(NOW())-2)
            " 
        );
        return view('twoweeksago', ['songs' => $songs]);
    }

    function threeweeksago(){

        $songs = DB::select("
            select
                * 
            from 
                songs
            where 
                songs.week = (YEARWEEK(NOW())-3)
            " 
        );
        return view('threeweeksago', ['songs' => $songs]);
    }
}
