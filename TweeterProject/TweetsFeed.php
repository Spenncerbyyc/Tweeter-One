<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Welcome to Your Feed</div>
                    <div class="card-body">
{{--                         <form method="post" action="{{route('users.update', Auth::user())}}">

                            {{ csrf_field() }}
                            {{ method_field('patch') }}

                            <input type="text" name="name"  value="{{ Auth::user()->name }}" />
                            <input type="email" name="email"  value="{{ Auth::user()->email }}" />

                            <button type="submit">Comment</button>
                            <button type="submit">Like</button>
                        </form> --}}

                        <form method="POST" action="{{route('users.update', Auth::user())}}">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bio" class="col-md-4 col-form-label text-md-right">Info</label>

                                <div class="col-md-6">
                                    <input id="bio" type="text" class="form-control" name="bio" value="{{ Auth::user()->bio }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>

    <br>

    <form method="POST" action="{{route('users.delete', Auth::user())}}">
        {{ csrf_field() }}
        {{ method_field('delete') }}

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Delete Your Account') }}
                </button>
            </div>
        </div>

    </form>

{{--     <div class="row justify-content-center">
        <div class="col-md-12">



            <form method="post" action="route('users.edit', $user)">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <input type="text" name="name"  value="{{ Auth::user()->name }}" />

                <input type="tweeter" name="" />

                <button type="submit">Send Your Tweet</button>

            </form>
        </div>
    </div> --}}
</div>
@endsection
</body>
