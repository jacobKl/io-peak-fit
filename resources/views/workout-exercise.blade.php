<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>

<main class="container">
    <form method="POST" action="{{ route('workoutExercise.edit', [ 'workout' => $workoutExercise->workout_id, 'workoutExercise' => $workoutExercise->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="workout_id" value="{{ $workoutExercise->workout_id }}">
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
</main>
