<ul>
@foreach ($users as $user)
    <li>{{ $user['u_name'] }}</li>
@endforeach
</ul>