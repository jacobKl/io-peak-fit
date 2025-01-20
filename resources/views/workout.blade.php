<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>

<main class="container">
    <h2>Trening {{ $workout->date }}</h2>
    <p>
        {{ $workout->description }}
    </p>

    <form method="POST" action="{{ route('exercise.store', [ 'workout' => $workout->id ]) }}" class="grid">
        @csrf
        <input type="hidden" name="workout_id" value="{{ $workout->id }}">
        <select name="exercise_id">
        @foreach ($exercises as $exercise)
            <option value='{{$exercise->id}}'> {{$exercise->name}} </option>
        @endforeach
        </select>

        <input type="number" name="repetitions" required placeholder="reps">
        <input type="number" name="sets" required placeholder="sets">
        <input type="number" name="weight" required placeholder="weight">

        <div>
            <button>Submit</button>
        </div>
    </form>

    <table border="1">
        <thead>
            <tr>
                <td>Exercise</td>
                <td>Reps</td>
                <td>Sets</td>
                <td>Weight</td>
                <td>Options</td>
            </tr>
        </thead>
        <tbody>
            @foreach($workout->workoutExercises as $workoutExercise)
                <tr>
                    <td>{{ $workoutExercise->exercise->name }}</td>
                    <td>{{ $workoutExercise->repetitions }}</td>
                    <td>{{ $workoutExercise->sets }}</td>
                    <td>{{ $workoutExercise->weight }}</td>
                    <td>
                        <div class="grid">
                            <form method="POST" action="{{ route('workoutExercise.delete', ['workout' => $workout->id, 'workoutExercise' => $workoutExercise->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <div>
                                <button><a style="color: white;" href="{{route('workoutExercise.show', ['workout' => $workout->id, 'workoutExercise' => $workoutExercise->id])}}">
                                    Edit
                                </a></button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form method="POST" action="{{ route('workout.delete', ['workout' => $workout->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('are you siur?')">Delete workout</button>
    </form>
</main>
