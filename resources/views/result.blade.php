<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat – RunRank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="min-h-screen bg-gradient-to-br from-zinc-950 via-zinc-900 to-zinc-950 text-white">

<div class="container mx-auto px-4 py-12 md:py-20">

    <div class="w-full max-w-2xl mx-auto space-y-8 animate-in fade-in duration-700">

        {{-- Rank Badge --}}
        <div class="bg-zinc-900/80 backdrop-blur-sm rounded-2xl border border-zinc-800 overflow-hidden text-center p-10">

            <div class="text-sm uppercase tracking-widest text-zinc-400 mb-3">
                Ton niveau
            </div>

            <div class="
                inline-block
                px-8 py-4
                rounded-xl
                text-3xl
                font-bold
                rank-reveal
                {{ strtolower($rank) }}

                @if($rank === 'Iron') bg-zinc-700
                @elseif($rank === 'Bronze') bg-amber-700
                @elseif($rank === 'Silver') bg-zinc-300 text-black
                @elseif($rank === 'Gold') bg-yellow-400 text-black
                @elseif($rank === 'Platinum') bg-teal-400 text-black
                @elseif($rank === 'Diamond') bg-blue-500
                @elseif($rank === 'Master') bg-purple-600
                @elseif($rank === 'Grandmaster') bg-red-600
                @else bg-yellow-500 text-black
                @endif
            ">
                {{ strtoupper($rank) }}
            </div>

        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Temps --}}
            <div class="bg-zinc-900/80 backdrop-blur-sm rounded-xl border border-zinc-800 p-6 space-y-3">
                <div class="flex items-center gap-2 text-zinc-400 uppercase tracking-wide text-sm">
                    🕒 Temps
                </div>
                <div class="space-y-1">
                    <p class="text-3xl text-white">{{ $time }}</p>
                    <p class="text-sm text-zinc-500">{{ $distance }}</p>
                </div>
            </div>

            {{-- Pace --}}
            <div class="bg-zinc-900/80 backdrop-blur-sm rounded-xl border border-zinc-800 p-6 space-y-3">
                <div class="flex items-center gap-2 text-zinc-400 uppercase tracking-wide text-sm">
                    ⚡ Pace
                </div>
                <div class="space-y-1">
                    <p class="text-3xl text-white">{{ $pace }}</p>
                    <p class="text-sm text-zinc-500">min / km</p>
                </div>
            </div>

            {{-- Percentile --}}
            <div class="bg-zinc-900/80 backdrop-blur-sm rounded-xl border border-zinc-800 p-6 space-y-3">
                <div class="flex items-center gap-2 text-zinc-400 uppercase tracking-wide text-sm">
                    📈 Percentile
                </div>
                <div class="space-y-1">
                    <p class="text-3xl text-white">Top {{ $percentile }}%</p>
                    <p class="text-sm text-zinc-500">des coureurs</p>
                </div>
            </div>

        </div>

        {{-- Action --}}
        <a href="/"
           class="block w-full text-center py-4 rounded-xl bg-zinc-800 hover:bg-zinc-700
                  text-white border border-zinc-700 transition-all duration-200 hover:scale-[1.02]">
            Refaire un calcul
        </a>

    </div>

</div>

</body>
</html>
