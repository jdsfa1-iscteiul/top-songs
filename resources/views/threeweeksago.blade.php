@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Three weeks ago TOP50</h2>
        <p>This is the list with the most played songs three weeks ago in Portugal</p>            
        <table class="table">
            <thead>
            <tr>
                <th>Rank</th>
                <th></th>
                <th>Name</th>
                <th>Artist</th>
                <th>Album</th>
            </tr>
            </thead>
            <tbody>
            <@foreach ($songs as $song)
                <tr>
                    <td>{{$song->position}}</td>
                    <td><img style="border-radius: 50%; width:50px" src={{$song->album_image_url}}></td>
                    <td><a href="{{$song->song_url}}">{{$song->name}}</a></td>
                    <td><a href="{{$song->artist_url}}">{{$song->artist}}</td>
                    <td>{{$song->album}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
