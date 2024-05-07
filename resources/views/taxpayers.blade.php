<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Számlázási Adatkezelő</title>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Számlázási Adatkezelő</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('invoiceheads.index')}}">Számlák</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('taxpayers.index')}}">Adózók</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('invoiceheads.create')}}">Új számla+</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('taxpayers.create')}}">Új adózó+</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid my-4">
    <div class="row align-items-center">
        <div class="col"></div>
        <div class="col-12 col-l-10 col-xl-8 bg-body-tertiary">
            <table class="table">
                <tr>
                    <th style="text-align: left; padding: 10px">Adózók nyilvántartása</th>
                    <th style="text-align: right; padding: 10px">
                        <a style="text-decoration: none" href="{{route('taxpayers.create')}}">
                            Új adózó hozzáadása+
                        </a>
                    </th>
                </tr>
            </table>
            <table class="table">
                <thead>
                <tr>
                    <th>Név</th>
                    <th>Bankszámlaszám</th>
                    <th>Lakcím</th>
                    <th>Műveletek</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taxpayers as $taxpayer)
                <tr>
                    <td>
                        <a href="{{ route('taxpayers.show', ['taxpayer' => $taxpayer]) }}" style="text-decoration: none">
                            {{$taxpayer->taxPayerName}}
                        </a>
                    </td>
                    <td>{{$taxpayer->bankAccountNumber}}</td>
                    <td>
                        {{$taxpayer->postalCode}},
                        {{$taxpayer->city}}
                        {{$taxpayer->streetName}}
                        {{$taxpayer->publicPlaceCategory}}
                        {{$taxpayer->number}}.
                    </td>
                    <td>
                        <div class="">
                            <form action="{{ route('taxpayers.destroy', ['taxpayer' => $taxpayer]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input style="width: 100%" class="btn btn-sm btn-outline-danger mt-1 flex-box" type="submit" value="Törlés">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
