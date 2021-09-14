<style>
    .desk-card {
  display: inline-block;
  width: 140px;
  height: 100px;
  background: #ce8888;
  
}
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>



<h1>This is room #{{ $room->id }}</h1>
<p>Desk capacity: {{ $room->desk_capacity }}</p>
<p>Size: {{ $room->size }}</p>

<form action="/rooms/{{ $room->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">
        Delete
    </button>
</form>

@if (!($room->desk_capacity == $numberOfEntries->count()))
<button type="button" class="collapsible">Add new desk</button>
<div class="content">
    <form action="/desks" method="POST">
        @csrf
        <br><br>
        <input type="number" placeholder="Price..." name="price">
        <input type="number" placeholder="Size..." name="size">
        <select name="position">
            <option value="next_to_the_window">Next the to window</option>
            <option value="next_to_the_door">Next to the door</option>
            <option value="center">Center</option>
        </select>
        <input type="number" placeholder="Room: {{ $room->id }}" name="room_id" value="{{ $room->id }}" readonly>
        <button type="submit">Submit</button>
    </form>
</div>
@endif

<br> <br>

@foreach ($room->desks as $desk)
    <a href="/desks/{{ $desk->id }}">
        <div class="desk-card">
            <h1>Desk #{{ $desk->id }}</h1>
        </div>
    </a>
@endforeach


<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    </script>