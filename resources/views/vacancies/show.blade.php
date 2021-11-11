<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes da Vaga</title>
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

        main .foo {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            margin: 5px;
        }

        .foo .buttons a button,
        .foo .buttons form button {
            width: auto;
            border-radius: 6px;
            padding: 10px;
            margin: 3px 5px;
            cursor: pointer;
            color: #fff;
            border: none;
            font-size: 0.8em;
            font-weight: bold;
        }

        .vacancy-container {
            width: 100%;
            background-color: none;
            border-bottom: 1px solid black;
            padding: 5px 0px;
        }

        .vacancy-container h2 a {
            font-weight: bold;
            text-decoration: none;
            color: #069cc2;
        }

        .buttons {
            display: flex;
        }

        li span {
            font-size: 0.75rem;
        }

        li a,
        li a:hover {
            text-decoration: none;
            color: #069cc2;
        }

    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('vacancies') }}">
            <button style="">
                Buscar Vagas
            </button>
        </a>
        <main>
            <div class="head">
                <h1>{{ $vacancy->title }}</h1>
            </div>

            <div class="vacancy-container">
                <h3>Requisitos/Habilidades técnicas:</h3>
                <ul>
                    @foreach ($vacancy->skills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>

                <h3>Candidatos adéquos:</h3>
                <ul>
                    @foreach ($vacancy->candidates as $candidate)
                        <li><a href="{{ route('candidate.id', ['id' => $candidate->id]) }}">
                                {{ $candidate->name }}
                            </a>
                            <br>
                            <span>
                                <strong>Habilidades do Candidato(a): </strong>
                                @foreach ($candidate->skills as $skill)
                                    {{ $skill->name }},
                                @endforeach
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="foo">
                <div class="buttons">
                    <a href="{{ route('vacancy.update', ['id' => $vacancy->id]) }}">
                        <button style="background: #ce6e01;">
                            Atualizar
                        </button>
                    </a>
                    <form method="post" action="{{ route('vacancy.delete') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $vacancy->id }}">
                        <button style="background: #B20000;">
                            Deletar
                        </button>
                    </form>
                </div>
                <span>Publicado em {{ date('d/m/Y', strtotime($vacancy->created_at)) }}</span>
            </div>
        </main>
        <a href="{{ route('vacancy.create') }}">
            <button style="">
                Cadastrar Vaga
            </button>
        </a>
    </div>
</body>

</html>
