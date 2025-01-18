<h2>Trening {{ $workout->date }}</h2>
<p>
    {{ $workout->description }}
</p>

<form method="POST" action="{{ route('exercise.store', [ 'workout' => $workout->id ]) }}">
    @csrf
    <select name="exercise_id">
       @foreach ($exercises as $exercise)
           <option value='{{$exercise->id}}'> {{$exercise->name}} </option>
       @endforeach
    </select>

    <input type="number" name="repetitions" required placeholder="reps">
    <input type="number" name="sets" required placeholder="sets">
    <input type="number" name="weight" required placeholder="weight">

    <button>Submit</button>
</form>
