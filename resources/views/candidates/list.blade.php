<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0px;
            font-family: 'Roboto', sans-serif;

        }

        .container {
            width: 100%;
            min-height: 100vh;
            background: #dfdfdf;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 10px 0px 50px 0px;
        }

        .container a button {
            width: 15vw;
            background: #069cc2;
            border-radius: 6px;
            padding: 15px;
            margin: 15px;
            cursor: pointer;
            color: #fff;
            border: none;
            font-size: 0.8em;
            font-weight: bold;
        }

        main {
            width: 60vw;
            height: auto;
            background: #fff;

            padding: 15px 30px;
            border-radius: 7px;
            display: flex;
            flex-direction: column;

        }

        main .head {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .candidate-container {
            width: 100%;
            background-color: none;
            border-bottom: 1px solid black;
            padding: 5px 0px;
        }

        .candidate-container h2 a {
            font-weight: bold;
            text-decoration: none;
            color: #069cc2;
        }

    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('home') }}">
            <button style="">
                Home
            </button>
        </a>
        <main>
            <div class="head">
                <h1>Candidatos</h1>
            </div>
            @foreach ($candidates as $candidate)
                <div class="candidate-container">
                    <h2><a href="/candidate/{{ $candidate->id }}">{{ $candidate->name }}</a></h2>
                    <p><strong>Habilidades: </strong>
                        @foreach ($candidate->skills as $skill)
                            {{ $skill->name }},
                        @endforeach
                    </p>

                </div>
            @endforeach
        </main>
        <a href="{{ route('candidate.create') }}">
            <button style="">
                Cadastrar Candidatos
            </button>
        </a>
    </div>
</body>

</html>
