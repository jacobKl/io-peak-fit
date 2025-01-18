<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>

<main class="container">
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

    <table border="1">
        <thead>
            <tr>
                <td>Exercise</td>
                <td>Reps</td>
                <td>Sets</td>
                <td>Weight</td>
            </tr>
        </thead>
        <tbody>
            @foreach($workout->workoutExercises as $exercise)
                <tr>
                    <td>{{ $exercise->exercise->name }}</td>
                    <td>{{ $exercise->repetitions }}</td>
                    <td>{{ $exercise->sets }}</td>
                    <td>{{ $exercise->weight }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
