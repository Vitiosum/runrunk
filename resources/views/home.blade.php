<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RunRank</title>
</head>
<body>

<h1>RunRank</h1>
<p>Classe ton niveau de coureur comme sur League of Legends.</p>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/result">
    @csrf

    <div>
        <label>Distance</label>
        <select name="distance">
            <option value="5k">5 km</option>
            <option value="10k">10 km</option>
            <option value="21k">Semi (21 km)</option>
            <option value="42k">Marathon (42 km)</option>
        </select>
    </div>

    <div>
        <label>Temps (mm ou mm:ss)</label>
        <input type="text" name="time" placeholder="20 ou 20:00">
    </div>

    <button type="submit">Calculer mon rank</button>
</form>

</body>
</html>
