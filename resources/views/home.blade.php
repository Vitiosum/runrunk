<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RunRank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind déjà chargé via Laravel --}}
</head>
<body class="min-h-screen bg-gradient-to-br from-zinc-950 via-zinc-900 to-zinc-950 text-white">

<div class="container mx-auto px-4 py-12 md:py-20">

    <div class="max-w-md mx-auto space-y-8 animate-in fade-in duration-500">

        {{-- Header --}}
        <div class="text-center space-y-4">
            <div class="flex items-center justify-center gap-3 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#00CED1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 21h8m-4-4v4m5-16l-1 5h-8l-1-5m10 0a3 3 0 10-6 0m6 0h1m-7 0H6" />
                </svg>

                <h1 class="text-5xl tracking-tight">
                    Run<span class="text-[#00CED1]">Rank</span>
                </h1>
            </div>

            <p class="text-zinc-400 text-lg">
                Classe ton niveau de coureur comme sur League of Legends
            </p>
        </div>

        {{-- Form --}}
        <form method="POST" action="/result"
              class="space-y-6 bg-zinc-900/50 backdrop-blur-sm rounded-2xl border border-zinc-800 p-8">
            @csrf

            {{-- Distance --}}
            <div class="space-y-3">
                <label class="block text-zinc-300">Distance</label>

                <select name="distance"
                        class="w-full px-4 py-4 bg-zinc-800 border border-zinc-700 rounded-lg text-white focus:outline-none focus:border-[#00CED1] focus:ring-2 focus:ring-[#00CED1]/20">
                    <option value="5k">5 km</option>
                    <option value="10k" selected>10 km</option>
                    <option value="21k">Semi-marathon (21 km)</option>
                    <option value="42k">Marathon (42 km)</option>
                </select>
            </div>

            {{-- Time --}}
            <div class="space-y-3">
                <label for="time" class="block text-zinc-300">Temps</label>

                <input
                    id="time"
                    name="time"
                    type="text"
                    placeholder="20, 20:00 ou 1:20:00"
                    value="{{ old('time') }}"
                    class="w-full px-4 py-4 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder:text-zinc-500 focus:outline-none focus:border-[#00CED1] focus:ring-2 focus:ring-[#00CED1]/20 transition-all"
                >

                @error('time')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-[#00CED1] to-[#00B4D8]
                           hover:from-[#00B4D8] hover:to-[#0096C7]
                           text-white rounded-lg transition-all duration-200
                           hover:scale-[1.02] shadow-lg shadow-[#00CED1]/20">
                Calculer mon rank
            </button>
        </form>

        {{-- Info --}}
        <div class="text-center text-zinc-500 text-sm space-y-1">
            <p>Formats acceptés :</p>
            <p class="text-zinc-600">
                20 (minutes) • 20:00 (MM:SS) • 1:20:00 (H:MM:SS)
            </p>
        </div>

    </div>
</div>

</body>
</html>
