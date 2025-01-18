<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>

<main class="container">
    <h1>
        Podsumowanie miesiąca.
    </h1>

    <div class="grid">
        <p>
            Wykonałeś {{ $analysis['workout_count'] }} treningów
        </p>

        <p>
            Zrobiłeś {{ $analysis['repetitions'] }} powtórzeń, {{ $analysis['sets'] }} serii
        </p>

        <p>
            Przerzuciłeś {{ $analysis['weight'] }} KG!
        </p>
    </div>
</main>
