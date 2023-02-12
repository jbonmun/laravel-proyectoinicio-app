<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;


use App\Models\CommunityLink;
use App\Models\Channel;
use Illuminate\Http\Request;



class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = CommunityLink::paginate(25);
        $channels = Channel::orderBy('title','asc')->get();
        return view('community/index', compact('links', 'channels'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* Este método store sirve para guardar los datos del formulario 
     * de la vista index para escribir un title y un link.
     * He tenido tb que incluir "use Illuminate\Support\Facades\Auth;" para que me reconociera la clase Auth 
     */
     public function store(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required',
            'link' =>  'required|active_url',
            
            // en el Ejercicio 1 de A35 he hecho un partial sacando de aquí el campo "channel_id" para 
            // llevármelo al método store del controlador ChannelController
            // O es mejor haberlo dejado aqui??????
        ]);
        //dd($request);
        request()->merge(['user_id' => Auth::id(), 'channel_id' => 1]);
        CommunityLink::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunityLink  $communityLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
