
@if (count($errors) > 0)
        <ul>
        <li class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </li>
        </ul>
@endif
