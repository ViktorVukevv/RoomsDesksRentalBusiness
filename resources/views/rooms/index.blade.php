<style>
    .room-card {
  display: inline-block;
  width: 120px;
  height: 100px;
  background: #ce8888;
  
}
</style>


@foreach ($rooms as $room)
    <a href="/rooms/{{ $room->id }}">
        <div class="room-card">
            <h1>Room #{{ $room->id }}</h1>
        </div>
    </a>
@endforeach

<br> <br> <br> <br>

<button><a href="/rooms/create">Create new room</a></button>