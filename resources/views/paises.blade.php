<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        .h1{
            text-transform: uppercase;
            margin: 50px 0px;
           transform: translateX(38%);
        }
    </style>
</head>
<body>
    <h1 class="h1">pais de la region</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>capital</th>
                <th>Moneda</th>
                <th>Poblacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paises as $pai => $infopais)
                <tr>
                    <td>
                        {{$pai}}
                    </td>
                    <td>
                        {{$infopais["capital"]}}
                    </td>
                    <td>
                        {{$infopais["moneda"]}}
                    </td>
                    <td>
                        {{$infopais["poblacion"]}}
                    </td>
                    <td>
                        {{$infopais["poblacion"]}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot></tfoot>
    </table>
</body>
</html>