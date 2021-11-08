<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vaga</title>
    <style>
        body {
            margin: 0px;
        }

        body,
        input,
        button {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .container {
            width: 100vw;
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

    </style>
</head>

<body>
    <div class="container">

        <h2>Cadastro de Candidato</h2>
        <div class="box">
            <form action="" method="post">
                <div class="form-item">
                    <input type="text" name="title" id="" required />
                    <label htmlFor="Titulo">
                        Nome Completo
                    </label>
                </div>

                <h4 for="Techs">Habilidades/Technologias</h4>

                @for ($i = 0; $i < 6; $i++)
                    <div class="form-checkbox">
                        <input type="checkbox" id="" class="check" name="tech" value="php">
                        <label for="PHP">lorem</label>
                    </div>
                @endfor

                <button type="submit">Cadastrar</button>

            </form>
        </div>
    </div>
</body>

</html>
