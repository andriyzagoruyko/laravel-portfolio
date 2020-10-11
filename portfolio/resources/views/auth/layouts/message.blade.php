@if (Session::has('flash_message'))

<div class="content__block section message message-{{ session('flash_message_type') }}">
    <div class = "message__body">
        <p>
            {{ session('flash_message') }}
        </p>
    </div>
</div>
@endif
