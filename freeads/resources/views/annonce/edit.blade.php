@extends('annonce.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modification annonce</div>

                <div class="card-body">
                    <form action="{{ route('annonces.update', $annonce_info->id) }}" method="POST" name="update_product" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Title</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $annonce_info->title }}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Description</strong>
                                    <input type="text" name="description" class="form-control" placeholder="Enter Product Code" value="{{ $annonce_info->description }}">
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Image</strong>
                                    <input type="file" class="form-control" col="4" name="image" value="{{ $annonce_info->image }}" multiple>
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Price</strong>
                                    <input type="text" name="price" class="form-control" placeholder="Enter Product Code" value="{{ $annonce_info->price }}">
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection