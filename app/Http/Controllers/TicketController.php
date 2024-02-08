<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Category;
use App\Models\Label;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->role == "0")
        {
            $tickets = Ticket::all();
        }
        else if(Auth::user()->role == "1" )
        {
            $tickets = Ticket::where('user_id', Auth::user()->id)->orWhere('agent_id', Auth::user()->id)->get();
        }
        else
        {
            $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        }
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();
        return view('ticket.create', compact('labels', "categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();

        $files = $request->file;
        if($files)
        {
            $newNames = [];
            foreach($files as $file)
            {
                
                $newName = "gallery_".uniqid().".".$file->extension();
                $file->storeAs("public/gallery", $newName);
                array_push($newNames, $newName);
            }
            $ticket->file = implode(",",$newNames);

        }
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        // $ticket->status = $request->status;
        $ticket->user_id = Auth::user()->id;//$request->user_id;
        $ticket->save();
        if($request->category_id){
            $ticket->categories()->attach($request->category_id);
        }
        if($request->label_id)
        {
            $ticket->labels()->attach($request->label_id);
        }
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        if(Auth::user()->role == "0" || Auth::user()->id == $ticket->agent_id || Auth::user()->id == $ticket->user_id)
        {
            return view('ticket.detail', compact('ticket'));
        }
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $labels = Label::all();
        $users = User::where('role', '1')->get();
        $categories = Category::all();
        $files = explode(",",$ticket->file);
        if(Auth::user()->role == "0" || Auth::user()->id == $ticket->agent_id)
        {
            return view('ticket.edit', compact('ticket', 'files', 'labels', 'categories', 'users'));
        }
        abort(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $id)
    {

        $ticket = Ticket::findOrfail($id);

        $files = $request->file;
        if($files)
        {
            $newNames = [];
            foreach($files as $file)
            {
                
                $newName = "gallery_".uniqid().".".$file->extension();
                $file->storeAs("public/gallery", $newName);
                array_push($newNames, $newName);
            }
            foreach(explode(",", $ticket->file) as $file){
                Storage::disk('public')->delete('gallery/'.$file);
            }
            $ticket->file = implode(",",$newNames);
        }
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        $ticket->status = $request->status;
        $ticket->agent_id = $request->agent_id;
        $ticket->user_id = Auth::user()->id;
        $ticket->update();
        if($request->category_id){
            $ticket->categories()->sync($request->category_id);
        }
        if($request->label_id)
        {
            $ticket->labels()->sync($request->label_id);
        }
        return redirect()->route('ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        if($ticket) 
        {
            if($ticket->file) {
                foreach(explode(",", $ticket->file) as $file){
                    Storage::disk('public')->delete('gallery/'.$file);
                }
            }
            $ticket->delete();
        }
        return back();
    }
}
