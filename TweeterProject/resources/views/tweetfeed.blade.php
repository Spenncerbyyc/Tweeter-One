<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>


@foreach($tweets as $tweet)

<p>{{$tweet->tweet_content}}</p>

<button type="submit">Comment</button>
<button type="submit">Like</button>
@endforeach



