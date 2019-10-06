<?php

namespace App\Http\Controllers;
use App\Annonce;
use Illuminate\Http\Request;
use App\Controllers\UserRequest;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['annonces'] = Annonce::orderBy('id','desc')->paginate(10);
   
        return view('annonce.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);
   
        Annonce::create($request->all());

        return redirect('annonces');
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
        $where = array('id' => $id);
        $data['annonce_info'] = Annonce::where($where)->first();
 
        return view('annonce.edit', $data);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);
         
        $file = $request->file('image')->store('public/images');

        $update = ['title' => $request->title, 'description' => $request->description,'image' => str_replace('public', 'storage', $file),'price' => $request->price];
        Annonce::where('id',$id)->update($update);

        
       return redirect('annonces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Annonce::where('id',$id)->delete();
   
        return redirect('annonces');
    }

    public function search(){
        $search = $request->input('search');

    }
    public function filter(){
        $annonce = collect([1,2,3,4]);

        $filtered = $collection->filter(function($value, $key){
            return $value > 2;
        });
        $filtered->all;
    }
}
