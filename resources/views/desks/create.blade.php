<h1>Create new desk</h1>

<form action="/desks" method="POST">
    @csrf
    <input type="number" placeholder="Price..." name="price">
    <input type="number" placeholder="Size..." name="size">
    <select name="position">
        <option value="next_to_the_window">Next the to window</option>
        <option value="next_to_the_door">Next to the door</option>
        <option value="center">Center</option>
    </select>
    <label>Room: </label>
    <select name="room_id">
        @foreach ($rooms as $room)
            <option>{{ $room->id}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>