<h2>Dodaj trening</h2>
<form method="POST" action="{{ route('workout.store') }}">
    @csrf
    <input type="hidden" name="userId" value="1">
    <input type="datetime-local" name="date">
    <textarea name="description"></textarea>
    <button>Submit</button>
</form>

@foreach ($workouts as $workout)
<a href="{{route('workout.show', ['workout' => $workout->id])}}">
    Trening {{ $workout->date }}
</a>
@endforeach