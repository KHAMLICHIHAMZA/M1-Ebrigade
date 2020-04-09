<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data=Http::get('http://localhost:8002/Users');

        $resp=json_decode($data);


            return view('utilisateurs.liste',[
            'users' => $resp


        ]);


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
    public function store(Request $request)
    {
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Http::get('http://localhost:8002/Users/FindByID/'.$id);
        $use=json_decode($data);
        $user=$use[0];


        return view ('utilisateurs.details', [ 'user' => $user ]);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Http::get('http://localhost:8002/Users/FindByID/'.$id);
        $user=json_decode($data);


        return view ('utilisateurs.update', [ 'user' => $user ]);

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

/*
        try{

        $data=Http::get('http://localhost:8002/Users/FindByID/'.$id);
        $use=json_decode($data);
        $user=$use[0];
        if(!$user)

        {
            return $this->notFound('user introuvable');
        }



        $data=array('post' =>$request->input());
        $str=http_build_query($data);
        $ch= curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://localhost:8002/Users/update");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$str);

        $output = curl_exec($ch);

        dd($output);



      return view('home');



    }catch(\Exception $e){
echo $e;

    }



*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          /*

        $dat=Http::get('http://localhost:8002/Users');

        $resp=json_decode($dat);

        $data=Http::get('http://localhost:8002/Users/DestroyByID/'.$id);

        $user=json_decode($data);


        return view ('home', [ 'user' => $resp]);

        */
    }


    public function delete($id)
    {
        $dat=Http::get('http://localhost:8002/Users');

        $resp=json_decode($dat);

        $data=Http::get('http://localhost:8002/Users/DestroyByID/'.$id);

        $user=json_decode($data);



        return view('utilisateurs.liste',[
            'users' => $resp


        ]);

    }




    public function updat(Request $request)
    {
/*

        $data=array('post' =>$request->input());
        $str=http_build_query($data);
        $ch= curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://localhost:8002/Users/update");
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

        $output = curl_exec($ch);

        dd($output);



      return view('home');
*/



    }








}
