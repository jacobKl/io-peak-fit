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
            Wykonałeś <b>{{ $analysis['workout_count'] }}</b> treningów
        </p>

        <p>
            Zrobiłeś <b>{{ $analysis['repetitions'] }}</b> powtórzeń, <b>{{ $analysis['sets'] }}</b> serii
        </p>

        <p>
            Przerzuciłeś <b>{{ $analysis['weight'] }}</b> KG!
        </p>
    </div>
</main>
