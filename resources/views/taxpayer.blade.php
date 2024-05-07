<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Számlázási Adatkezelő</title>
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
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 bg-body-tertiary">
            <h5 class="mb-3 pt-3">Adózó adatai</h5>
            <div style="display:{{$display ?? 'none'}}" class="display-7">
                <div class="alert alert-danger" role="alert">{{$message ?? null}}</div>
            </div>
            @if($taxpayer->trashed())
                <table style="width: 100%; border-top: #cbd5e0 solid 1px">
                    <tr style="width: 100%">
                        <td style="text-align: left; width: 50%; padding: 15px">
                            <a href="{{route('taxpayers.index')}}">Vissza az adózókhoz</a>
                        </td>
                        <td style="text-align: right; width: 50%; padding: 15px">
                            <a href="{{route('invoiceheads.index')}}">Vissza a számlákhoz</a>
                        </td>
                    </tr>
                </table>
            @else
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Név</th>
                        <td>{{$taxpayer->taxPayerName}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Bankszámlaszám</th>
                        <td>{{$taxpayer->bankAccountNumber}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Cím</th>
                        <td>
                            {{$taxpayer->postalCode}},
                            {{$taxpayer->city}}
                            {{$taxpayer->streetName}}
                            {{$taxpayer->publicPlaceCategory}}
                            {{$taxpayer->number}}.
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Adószám</th>
                        <td>
                            {{$taxpayer->taxnumber->taxpayerId ?? " "}}
                            - {{$taxpayer->taxnumber->vatCode ?? " "}}
                            - {{$taxpayer->taxnumber->countyCode ?? " "}}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Gazdasági típus</th>
                        <td>
                            @switch($taxpayer->incorporation)
                            @case("ORGANIZATION") {{"Gazdasági társaság"}} @break
                            @case("SELF_EMPLOYED") {{"Egyéni vállalkozó"}} @break
                            @case("TAXABLE_PERSON") {{"Adószámos magánszemély"}} @break
                            @default {{"-"}}
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>ÁFA sz. státusza</th>
                        <td>
                            @switch($taxpayer->taxPayerVatStatus)
                            @case("DOMESTIC") {{"Belföldi áfaalany"}} @break
                            @case("OTHER") {{"Egyéb"}} @break
                            @case("PRIVATE_PERSON") {{"Nem áfaalany (belföldi vagy külföldi) természetes személy"}} @break
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>Alanyi áfamentes</th>
                        <td>{{($taxpayer->individualExemption) ? "Igen" : "Nem"}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h5>Adózó számlái</h5>
            @foreach($taxpayer->invoiceHeadSupplier as $invoicehead)
            <table style="border: #2d3748 solid 1px; border-collapse: collapse; margin: 15px">
                <tr>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px" colspan="5">
                        <a href="{{route('invoiceheads.show', ['invoicehead' => $invoicehead])}}">Számla részletei</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: left; width: 50%; padding: 5px">
                        Szállító:
                        <a href="{{ route('taxpayers.show', ['taxpayer' => $invoicehead->supplierTP]) }}">
                            {{$invoicehead->supplierTP->taxPayerName ?? "Hiányzik"}}
                        </a>
                    </td>
                    <td colspan="2" style="text-align: left; width: 50%; padding: 5px">
                        Vevő:
                        <a href="{{ route('taxpayers.show', ['taxpayer' => $invoicehead->customerTP]) }}">
                            {{$invoicehead->customerTP->taxPayerName}}
                        </a>
                    </td>
                </tr>
                <tr style="vertical-align: bottom">
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 16rem">
                        Teljesítés:<br>
                        {{$invoicehead->invoiceDetail->invoiceDeliveryDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
                        Számla kelte:<br>
                        {{$invoicehead->invoiceIssueDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
                        Fizetés esedékessége:<br>
                        {{$invoicehead->invoiceDetail->paymentDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
                        Fizetés módja:<br>
                        @switch($invoicehead->invoiceDetail->paymentMethod)
                        @case("CASH") {{"Készpénz"}} @break
                        @case("CARD") {{"Bankkártya"}} @break
                        @case("TRANSFER") {{"Banki utalás"}} @break
                        @case("VOUCHER") {{"Utalvány"}} @break
                        @default {{"Egyéb"}}
                        @endswitch
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
                        Számla sorszáma:<br>
                        {{$invoicehead->invoiceNumber}}
                    </td>
                </tr>
            </table>
            @endforeach

            @foreach($taxpayer->invoiceHeadCustomer as $invoicehead)
            <table style="border: #2d3748 solid 1px; border-collapse: collapse; margin: 15px">
                <tr>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px" colspan="5">
                        <a href="{{route('invoiceheads.show', ['invoicehead' => $invoicehead])}}">Számla részletei</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: left; width: 50%; padding: 5px">
                        Szállító:
                        <a href="{{ route('taxpayers.show', ['taxpayer' => $invoicehead->supplierTP]) }}">
                            {{$invoicehead->supplierTP->taxPayerName ?? "Hiányzik"}}
                        </a>
                    </td>
                    <td colspan="2" style="text-align: left; width: 50%; padding: 5px">
                        Vevő:
                        <a href="{{ route('taxpayers.show', ['taxpayer' => $invoicehead->customerTP]) }}">
                            {{$invoicehead->customerTP->taxPayerName}}
                        </a>
                    </td>
                </tr>
                <tr style="vertical-align: bottom">
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 16rem">
                        Teljesítés:<br>
                        {{$invoicehead->invoiceDetail->invoiceDeliveryDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
                        Számla kelte:<br>
                        {{$invoicehead->invoiceIssueDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
                        Fizetés esedékessége:<br>
                        {{$invoicehead->invoiceDetail->paymentDate}}
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
                        Fizetés módja:<br>
                        @switch($invoicehead->invoiceDetail->paymentMethod)
                        @case("CASH") {{"Készpénz"}} @break
                        @case("CARD") {{"Bankkártya"}} @break
                        @case("TRANSFER") {{"Banki utalás"}} @break
                        @case("VOUCHER") {{"Utalvány"}} @break
                        @default {{"Egyéb"}}
                        @endswitch
                    </td>
                    <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
                        Számla sorszáma:<br>
                        {{$invoicehead->invoiceNumber}}
                    </td>
                </tr>
            </table>
            @endforeach
            @endif
        </div>
        <div class="col"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
