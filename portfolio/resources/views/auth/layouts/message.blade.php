@if (Session::has('flash_message'))
<div class="content__block section message message-{{ session('flash_message_type') }}">
    <div class = "message__body">
        <p>
            {{ session('flash_message') }}
        </p>
    </div>
</div>
@endif

@if ($errors->any())
    <div class="content__block section message message-danger">
        <div class = "message__body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif