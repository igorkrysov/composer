
<br>
User: <b>{{ $user->getName() }}</b> <br>
Posts: <br>
<ul>
@foreach ($user->getPosts()->getValues() as $post)
    <li>{{ $post->getTitle() }}</li>
@endforeach
</ul>