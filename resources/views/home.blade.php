<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            margin: 0px;
        }

        .container {
            width: 100vw;
            height: 100vh;
            background: #dfdfdf;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .box {
            width: 50vh;
            height: auto;
            background: #fff;

            padding: 15px;
            border-radius: 7px;

            display: flex;
            flex-direction: column;

            -webkit-box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
            -moz-box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
            box-shadow: 11px 11px 10px rgba(50, 50, 50, 0.55);
        }

        a button {
            width: 100%;
            background: #069cc2;
            border-radius: 6px;
            padding: 15px;
            cursor: pointer;
            color: #fff;
            border: none;
            font-size: 16px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <a href="{{ route('vacancies') }}">
                <button style="">
                    Buscar vagas
                </button>
            </a>
            <br>
            <a href=" {{ route('vacancy.create') }}">
                <button style="">
                    Cadastrar vaga
                </button>
            </a>
            <br>
            <a href=" {{ route('candidate.create') }}">
                <button style="">
                    Candidate-se
                </button>
            </a>
        </div>
    </div>
</body>

</html>
