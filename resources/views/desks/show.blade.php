<h1>This is desk #{{ $desk->id }}</h1>
<p>Price: {{ $desk->price }}</p>
<p>Size: {{ $desk->size }}</p>
<p>Position: {{ $desk->position }}</p>
@if ($desk->is_taken == true)
    <p>The desk is taken for {{ $desk->paid_time }}</p>
@else
    <p>The desk is free</p>
@endif

<form action="/desks/{{ $desk->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">
        Delete
    </button>
</form>