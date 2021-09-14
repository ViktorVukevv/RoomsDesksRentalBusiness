<h1>Create new room</h1>

<form action="/rooms" method="POST">
    @csrf
    <input type="number" placeholder="Desk capacity..." name="desk_capacity">
    <input type="number" placeholder="Size..." name="size">
    <button type="submit">Submit</button>
</form>