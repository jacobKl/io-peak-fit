<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>

<main class="container">
    <h2>Dodaj trening</h2>
    <form method="POST" action="{{ route('workout.store') }}">
        @csrf
        <input type="hidden" name="userId" value="1">
        <input type="datetime-local" name="date">
        <textarea name="description" placeholder="Description"></textarea>
        <button>Submit</button>
    </form>

    @foreach ($workouts as $workout)
    <div>
        <a href="{{route('workout.show', ['workout' => $workout->id])}}">
            Trening {{ $workout->date }}
        </a>
    </div>
    @endforeach
</main>
