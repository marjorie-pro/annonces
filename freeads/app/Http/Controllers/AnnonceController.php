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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required',
        ]);

 
 

    //     if($request->hasfile('image')){
    //     $file = array('image' => Input::file('image'));
    //     $destinationPath = 'image/'; // upload path
    //     $extension = Input::file('image')->getClientOriginalExtension(); 
    //     $fileName = rand(11111,99999).'.'.$extension; // renaming image
    //     Input::file('image')->move($destinationPath, $fileName);
    // }
    // else{
    //     echo "Please Upload Your Profile Image!";
    
           
    //        // $path = $request->file('image')->store('image');
    //        // return $path;
    //     }


        // if($request->hasfile('image')){
        //    foreach ($request->file('image') as $image) {
        //        $name=$image->getClientOriginalName();
        //         $image->move(public_path().'/images/', $name);  
        //         $data[] = $name;
        //    }
        // }
        // else {
        //     echo "heu erreur là";
        // }

        // if($request->hasfile('image')){
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $request->image = $filename;
        // }
        // else {
        //     echo "heu erreur là";
        // }
   
        Annonce::create($request->all());

        $ann->save();
    
        return \Redirect::to('annonces')
       ->with('success','Greate! Annonce created successfully.');
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

       // $file = $request->file('image')->store('images');

       // dd($file);
       // $path = storage_path('public/'. $file);
       // dd($file);
       // $path = $file->store('/images');
       // $path = $request->photo->store('images');
       // dd($_FILES['image']['tmp_name']);
        // dd($file);
        
        return \Redirect::to('annonces')
       ->with('success','Great! Annonce updated successfully');
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
   
        return \Redirect::to('annonces')->with('success','Annonce deleted successfully');
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
