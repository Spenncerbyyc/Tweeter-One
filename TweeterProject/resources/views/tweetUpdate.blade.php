
@extends('layouts.app')
{{-- display tweets first, then add comments, edits, and deletes. loop through tweets, show content --}}
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">Welcome to Your Feed</div>
                   <div class="card-body">

                       <form method="POST" action="/savetweet/{{$tweet->id}}">
                           {{ csrf_field() }}
                           {{ method_field('PATCH') }}

                           <div class="form-group row">
                               <label for="bio" class="col-md-4 col-form-label text-md-right">Send Tweet</label>

                               <div class="col-md-6">
                                   <input id="bio" type="text" class="form-control" name="tweet" value="{{$tweet->tweet_content}}">
                               </div>
                           </div>

                           <div class="form-group row mb-0">
                               <div class="col-md-8 offset-md-4">
                                   <button type="submit" class="btn btn-primary">
                                       {{ __('Update') }}
                                   </button>
                               </div>
                           </div>
                               </div>
                           </div>

                       </form>
                   </div>
           </div>
       </div>
   </div>

   <br>


</div>
@endsection


