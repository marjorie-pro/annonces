@extends('annonce.layout')

@section('content')


<div class="container">
  <div class="row justify-content-center">

   
     <div class="card">
          
        <div class="card-header">annonces</div>
        <div class="card-header"><a href="{{ route('annonces.create') }}" class="btn btn-success mb-2">Add</a> 
<br></div>

        <div class="card-body">
         <div class="row">
          <div class="col-12">
            <input type="text" name="search" placeholder="rechercher..."><br>
            <input type="submit" value="Rechercher">
            <table class="table table-bordered" id="laravel_crud">
             <thead>
              <tr>
               <th>Id</th>
               <th>Title</th>
               <th>Description</th>
               <th>Image</th>
               <th>price</th>
               <td colspan="3" align="center">Actions</td>
             </tr>
           </thead>
           <tbody>
            @foreach($annonces as $annonce)
            <tr>
             <td>{{ $annonce->id }}</td>
             <td>{{ $annonce->title }}</td>
             <td>{{ $annonce->description }}</td>
             <td><img src="{{ $annonce->image }}"></td>
             <td>{{ $annonce->price }}</td>
             <td>{{ date('Y-m-d', strtotime($annonce->created_at)) }}</td>
             <td><a href="{{ route('annonces.edit',$annonce->id)}}" class="btn btn-primary">Edit</a></td>
             <td>

               <form action="{{ route('annonces.destroy', $annonce->id)}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!! $annonces->links() !!}
    </div> 
  </div>
</div>
</div>

</div>
</div>
@endsection