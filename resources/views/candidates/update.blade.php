<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <title>Alterar Dados do Candidato</title>
    <style>
        body {
            margin: 0px;
            line-height: 1;
        }

        body,
        input,
        button {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .container {
            width: 100vw;
            max-width: 100vw;
            height: 100vh;
            background: #dfdfdf;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box {
            width: 100%;
            max-width: 400px;
            height: auto;
            background: #fff;

            padding: 30px 15px;
            border-radius: 7px;

            display: flex;
            flex-direction: column;

            -webkit-box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
            -moz-box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
            box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
        }

        button {
            width: 100%;
            background: #069cc2;
            border-radius: 6px;
            padding: 15px;
            cursor: pointer;
            color: #fff;
            border: none;
            font-size: 16px;
        }

        button.close {
            width: auto;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
        }

        form .form-item {
            position: relative;
        }

        form .form-checkbox {
            display: flex;
            flex-direction: row;
            margin-bottom: 18px;
        }

        .box form .form-item label {
            position: absolute;
            top: 0px;
            left: 0;
            padding: 5px 7px;
            transition: 1.2s;
        }

        .box form .form-item input:focus~label,
        .box form .form-item input:valid~label {
            transform: translateY(-24px);
            font-size: 0.8em;
            letter-spacing: 0.1em;
        }

        form input {
            height: 30px;
            width: 95%;

            background-color: #F0F0F0;

            margin-bottom: 25px;
            padding: 7px;
            border: 0px;
            border-radius: 10px;
            border-bottom: 1px solid #069cc2;

            outline: none;
        }

        form input.check {
            height: auto;
            width: auto;
            margin: 1px 5px;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .fade.show {
            opacity: 1;
        }

        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 2rem;
            border: 1 px solid transparent;
            border-radius: 0.25rem;
        }

        .fade {
            opacity: 0;
            transition: opacity .15s linear;
        }

        .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.75rem 1.25rem;
            color: inherit;
        }

    </style>
</head>

<body>
    <div class="container">

        <h2>Alterar Dados do Candidato</h2>
        <div class="box">

            @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning</strong> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('candidate.change') }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $candidate->id }} ">
                <div class="form-item">
                    <input type="text" name="name" id="" required value="{{ $candidate->name }}" />
                    <label htmlFor="Name">
                        Nome Completo
                    </label>
                </div>

                <h4 for="Techs">Habilidades/Technologias</h4>

                @foreach ($skills as $skill)
                    <div class="form-checkbox">
                        <input type="checkbox" id="" class="check" name="{{ $skill->name }}"
                            value="{{ $skill->id }}" @foreach ($candidate->skills as $candidate_skill)
                        @if ($candidate_skill->id == $skill->id)
                            checked
                        @endif
                @endforeach>
                <label for="{{ $skill->id }}">{{ $skill->name }}</label>
        </div>
        @endforeach

        <button type="submit">Atualizar</button>

        </form>
    </div>
    </div>
</body>

</html>
