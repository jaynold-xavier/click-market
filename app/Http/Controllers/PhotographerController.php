<?php

namespace App\Http\Controllers;

use App\Photographer;
use Illuminate\Http\Request;
use App\Http\Controllers\FirebaseService;

class PhotographerController extends Controller
{
    private $myFirebaseService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->myFirebaseService = new FirebaseService();
        $data = $this->myFirebaseService->retrieveData();
        if ($data == null) {
            $data = [];
        }
        return view('photographer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photographer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|alpha_dash',
            'dt' => 'required|date|before_or_equal:31 December 1999',
            'email' => 'required|email',
            'phone' => 'required|string',
            'weblink' => 'required|url',
            'avatar' => 'required|url'
        ]);

        $this->myFirebaseService = new FirebaseService();
        $key = $this->myFirebaseService->pushData($data);

        return redirect()
            ->route('photographer.show', ['photographer' => $key])
            ->with('succ_message', 'Account Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photographer  $photographer
     * @return \Illuminate\Http\Response
     */
    public function show($photographer)
    {
        $data = json_decode(file_get_contents('http://www.splashbase.co/api/v1/images/search?query=people'));
        //dd($data->images);

        $this->myFirebaseService = new FirebaseService();
        $photographer = $this->myFirebaseService->retrievePhotographer($photographer);
        return view('photographer.show',compact('photographer','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photographer  $photographer
     * @return \Illuminate\Http\Response
     */
    public function edit(Photographer $photographer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photographer  $photographer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photographer $photographer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photographer  $photographer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->myFirebaseService = new FirebaseService();
        $this->myFirebaseService->deleteData($request['pkey']);
        return redirect('/photographer')
                ->with('del_message',"DELETION DONE!!");
    }
}
