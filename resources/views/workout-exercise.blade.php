<form method="POST" action="{{ route('workoutExercise.edit', [ 'workout' => $workoutExercise->workout_id, 'workoutExercise' => $workoutExercise->id]) }}">
    @csrf
    <select name="exercise_id">
    @foreach ($exercises as $exercise)
        <option value='{{$exercise->id}}' 
            @if ($exercise->id == $workoutExercise->exercise_id)
                selected
            @endif>
            {{$exercise->name}}
        </option>
    @endforeach
    </select>

    <input type="number" name="repetitions" required value="{{ $workoutExercise->repetitions }}">
    <input type="number" name="sets" required value="{{ $workoutExercise->sets }}">
    <input type="number" name="weight" required value="{{ $workoutExercise->weight }}">

    <button>Submit</button>
</form>