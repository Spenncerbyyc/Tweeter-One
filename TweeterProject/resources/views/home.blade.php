@extends('layouts.app')

@section('js')

    <script>
        var updateChirpStats = {
            Like: function (chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent++;
            },

            Liked: function(chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent--;
            }
        };


        var toggleButtonText = {
            Like: function(button) {
                button.textContent = "Liked";
                button.style.backgroundColor = "#dc3545";
            },

            Liked: function(button) {
                button.textContent = "Like";
                button.style.backgroundColor = "#38c172";
            }
        };

        var actOnLike = function (event) {
            var chirpId = event.target.dataset.chirpId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateChirpStats[action](chirpId);
            axios.post('/' + chirpId + '/act',
                { action: action });
        };
    </script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Tweets</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-center font-weight-bold" style="font-size: 25px;"><i class="fas fa-user-edit"></i></label>
                        <label class="col-md-4 col-form-label text-md-center font-weight-bold" style="font-size: 25px;"><i class="fab fa-twitter"></i></label>
                        <label class="col-md-2 col-form-label text-md-center font-weight-bold" style="font-size: 25px;"><i class="fas fa-heart"></i></label>
                        <label class="col-md-2 col-form-label text-md-center font-weight-bold" style="font-size: 25px;"><i class="far fa-calendar-alt"></i></label>
                        <label class="col-md-1 col-form-label text-md-center font-weight-bold" style="font-size: 25px;"><i class="fas fa-cogs"></i></label>
                    </div>
                    <hr>
                    @foreach($tweets ?? '' as $tweet)
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-center">{{$tweet->user->name}}</label>
                        <label class="col-md-4 col-form-label text-md-left">{{$tweet->tweet_content}}</label>
                        <label class="col-md-2 col-form-label text-md-center">
                            <span id="likes-count-{{ $tweet->id }}">{{ $tweet->likes }}</span><br>
                            <button class="btn btn-success" style="height: 40px; width: 70px;" type="button" onclick="actOnLike(event);" data-chirp-id="{{ $tweet->id }}">Like</button>
                        </label>
                        <label class="col-md-2 col-form-label text-md-center">{{ \Carbon\Carbon::parse($tweet->created_at)->format('M d, Y h:m a')}}</label>
                        <label class="col-md-1 col-form-label text-md-center">
                            @if($user == $tweet->user)
                                <form method="POST" action="/tweetUpdate/{{$tweet->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                                    <button style="font-size: 25px;padding: 2px 0;line-height: 0;" class='btn btn-default' type='submit' value='Patch'>
                                        <i class="fas fa-pen-square"></i>
                                    </button>
                                </form>
                                <form method="POST" action="/{{$tweet->id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button style="font-size: 25px;padding: 2px 0;line-height: 0;" class='btn btn-default' type='submit' value='Delete'>
                                        <i class='fas fa-trash-alt'> </i>
                                    </button>
                                </form>
                            @endif
                        </label>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


