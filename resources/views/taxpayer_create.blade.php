<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Számlázási Adatkezelő</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="#">Új számla+</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('taxpayers.create')}}">Új adózó+</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container p-4 my-4 bg-body-tertiary">
    <h4 class="mb-3">Adózói adatok</h4>
    <form id="contactForm" action="{{route('taxpayers.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 form-floating mb-3">
                <input class="form-control" id="taxPayerName" type="text" placeholder="* Adóalany neve"/>
                <label class="ms-2" for="taxPayerName">* Adóalany neve</label>
            </div>
            <div class="col-4 form-floating mb-3">
                <input class="form-control" id="postalCode" type="text" placeholder="* Irányítószám"/>
                <label class="ms-2" for="postalCode">* Irányítószám</label>
            </div>
            <div class="col-8 form-floating mb-3">
                <input class="form-control" id="city" type="text" placeholder="* Település"/>
                <label class="ms-2"  for="city">* Település</label>
            </div>
            <div class="col-8 form-floating mb-3">
                <input class="form-control" id="streetName" type="text" placeholder="* Közterület neve"/>
                <label class="ms-2" for="streetName">* Közterület neve</label>
            </div>
            <div class="col-4 form-floating mb-3">
                <input class="form-control" id="publicPlaceCategory" type="text" placeholder="* Közterület jellege"/>
                <label class="ms-2" for="publicPlaceCategory">* Közterület jellege</label>
            </div>
            <div class="col-4 form-floating mb-3">
                <input class="form-control" id="number" type="text" placeholder="Házszám" data-sb-validations=""/>
                <label class="ms-2" for="number">Házszám</label>
            </div>
            <div class="col-8 form-floating mb-3">
                <input class="form-control" id="additionalAddressDetail" type="text" placeholder="További címadatok"
                       data-sb-validations=""/>
                <label class="ms-2" for="additionalAddressDetail">További címadatok</label>
            </div>
            <label for="" class="form-label">Adószám</label>
            <div class="col-12 form-floating mb-3">
                <div class="input-group">
                    <div class="form-floating">
                        <input class="form-control" id="taxpayerId" type="text" placeholder="Adó törzsszám"/>
                        <label class="ms-2" for="taxpayerId">Törzsszám</label>
                    </div>
                    <div class="input-group-text">-</div>
                    <div class="form-floating">
                        <input class="form-control" id="vatCode" type="text" placeholder="Áfakód"/>
                        <label class="ms-2" for="vatCode">Áfakód</label>
                    </div>
                    <div class="input-group-text">-</div>
                    <div class="form-floating">
                        <input class="form-control" id="countyCode" type="text" placeholder="Megyekód"/>
                        <label class="ms-2" for="countyCode">Megyekód</label>
                    </div>
                </div>
            </div>
            <label for="" class="form-label">ÁFA-csoport tag adószáma</label>
            <div class="col-12 form-floating mb-3">
                <div class="input-group">
                    <div class="form-floating">
                        <input class="form-control" id="taxpayerId" type="text" placeholder="Adó törzsszám"/>
                        <label class="ms-2" for="taxpayerId">Törzsszám</label>
                    </div>
                    <div class="input-group-text">-</div>
                    <div class="form-floating">
                        <input class="form-control" id="vatCode" type="text" placeholder="Áfakód"/>
                        <label class="ms-2" for="vatCode">Áfakód</label>
                    </div>
                    <div class="input-group-text">-</div>
                    <div class="form-floating">
                        <input class="form-control" id="countyCode" type="text" placeholder="Megyekód"/>
                        <label class="ms-2" for="countyCode">Megyekód</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="communityVatNumber" type="text" placeholder="Közösségi adószám"/>
                <label class="ms-2" for="communityVatNumber">Közösségi adószám</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="incorporation" aria-label="Gazdasági típus">
                    <option value=""></option>
                    <option value="ORGANIZATION">Gazdasági társaság</option>
                    <option value="SELF_EMPLOYED">Egyéni vállalkozó</option>
                    <option value="TAXABLE_PERSON">Adószámos magánszemély</option>
                </select>
                <label class="ms-2" for="incorporation">Gazdasági típus</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="taxPayerVatStatus" aria-label="ÁFA sz. státusza">
                    <option value=""> </option>
                    <option value="DOMESTIC">Belföldi áfaalany</option>
                    <option value="OTHER">Egyéb</option>
                    <option value="PRIVATE_PERSON">Nem áfaalany (belföldi vagy külföldi) természetes személy</option>
                </select>
                <label class="ms-2" for="taxPayerVatStatus">ÁFA sz. státusza</label>
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" id="individualExemption" type="checkbox" name="alanyiAfamentes"/>
                    <label class="form-check-label" for="individualExemption">Alanyi áfamentes</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" id="kisadozo" type="checkbox" name="kisadozo"/>
                    <label class="form-check-label" for="kisadozo">Kisadózó</label>
                </div>
            </div>
            <div class="d-grid">
                <input class="btn btn-secondary" id="submitButton" type="submit" value="Adatok elküldése"/>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>
</html>
