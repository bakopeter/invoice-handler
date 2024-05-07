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
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 bg-body-tertiary p-3">
                    <h5 class="mb-3">Normál számla</h5>
                    <div style="display:{{$display ?? 'none'}}" class="display-7">
                        <div class="alert alert-danger" role="alert">{{$message ?? null}}</div>
                    </div>
                    @if($invoicehead->trashed())
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
                    <table style="border: #2d3748 solid 1px; border-collapse: collapse;">
                        <tr>
                            <td style="border: #2d3748 solid 1px; text-align: center" colspan="5">SZÁMLA</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: left; width: 50%; padding: 5px">
                                <div>
                                    Szállító:
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->supplierTP->taxPayerName ?? ""}}
                                    </div>
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->supplierTP->postalCode}},
                                        {{$invoicehead->supplierTP->city}}
                                        {{$invoicehead->supplierTP->streetName}}
                                        {{$invoicehead->supplierTP->publicPlaceCategory}}
                                        {{$invoicehead->supplierTP->number}}.
                                    </div>
                                </div>
                                <br>
                                <div>
                                    Bankszámlaszám:
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->supplierTP->bankAccountNumber}}
                                    </div>
                                </div>
                                <br>
                                <div>
                                    Adószám:
                                    {{$invoicehead->supplierTP->taxnumber->taxpayerId ?? null}}
                                    - {{$invoicehead->supplierTP->taxnumber->vatCode ?? null}}
                                    - {{$invoicehead->supplierTP->taxnumber->countyCode ?? null}}
                                </div>
                            </td>
                            <td colspan="2" style="text-align: left; width: 50%; border: #2d3748 solid 1px; padding: 5px">
                                <div>
                                    Vevő:
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->customerTP->taxPayerName}}
                                    </div>
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->customerTP->postalCode}},
                                        {{$invoicehead->customerTP->city}}
                                        {{$invoicehead->customerTP->streetName}}
                                        {{$invoicehead->customerTP->publicPlaceCategory}}
                                        {{$invoicehead->customerTP->number}}.
                                    </div>
                                </div>
                                <br>
                                <div>
                                    Bankszámlaszám:
                                    <div style="text-indent: 20px">
                                        {{$invoicehead->customerTP->bankAccountNumber}}
                                    </div>
                                </div>
                                <br>
                                <div>
                                    Adószám:
                                    {{$invoicehead->customerTP->taxnumber->taxpayerId ?? null}}
                                    - {{$invoicehead->customerTP->taxnumber->vatCode ?? null}}
                                    - {{$invoicehead->customerTP->taxnumber->countyCode ?? null}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: #2d3748 solid 1px; height: 20px" colspan="3"></td>
                            <td style="border: #2d3748 solid 1px" colspan="2"></td>
                        </tr>
                        <tr style="vertical-align: top">
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
                        <tr style="border-collapse: collapse">
                            <td colspan="5" style="border-collapse: collapse">
                                <table style="border-collapse: collapse">
                                    <tr style="border-collapse: collapse">
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 20rem">
                                            Megnevezés
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 5rem">
                                            Áfa
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                                            Mennyiség
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                                            Egységár ÁFA nélkül Ft
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                                            Nettó érték Ft
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                                            ÁFA összege Ft
                                        </td>
                                        <td style="border-bottom: #2d3748 solid 1px; padding: 5px; width: 15rem">Összesen Ft</td>
                                    </tr>
                                    @foreach($invoicehead->invoiceLines as $invoiceLine)
                                    <tr style="border-collapse: collapse">
                                        <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px">
                                            {{$invoiceLine->lineDescription}}
                                        </td>
                                        <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{$invoiceLine->vatPercentage*100}}%
                                        </td>
                                        <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{round($invoiceLine->quantity)}}
                                        </td>
                                        <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{round($invoiceLine->unitPrice, 2)}}
                                        </td>
                                        <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{round($invoiceLine->lineNetAmount)}}
                                        </td>
                                        <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{round($invoiceLine->lineVatAmount)}}
                                        </td>
                                        <td style="border-bottom : #2d3748 solid 1px; text-align: right; padding: 5px">
                                            {{round($invoiceLine->lineGrossAmount)}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>

                                    </tr>
                                </table>
                                <div style="display:{{$display ?? 'block'}}" class="display-7">
                                    <form action="{{route('invoiceheads.update', ['invoicehead' => $invoicehead])}}" method="PUT">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <select class="form-select border-0 border-bottom" id="lineNatureIndicator" name="lineNatureIndicator"
                                                        aria-label="Termék/szolgáltatás">
                                                    <option value="PRODUCT" @selected(old('lineNatureIndicator') == 'PRODUCT')>Termék</option>
                                                    <option value=" SERVICE" @selected(old('lineNatureIndicator') == ' SERVICE')>Szolgáltatás</option>
                                                    <option value="OTHER" @selected(old('lineNatureIndicator') == 'OTHER')>Egyéb</option>
                                                </select>
                                                <label class="ms-2" for="lineNatureIndicator">Termék/szolgáltatás</label>
                                                @error('lineNatureIndicator') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('lineDescription')}}" id="lineDescription" name="lineDescription" type="text"
                                                       placeholder="* Megnevezés"  class="form-control border-0 border-bottom"/>
                                                <label class="ms-2" for="lineDescription">* Megnevezés</label>
                                                @error('lineDescription') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('quantity')}}" class="form-control border-0 border-bottom" id="quantity"
                                                       name="quantity" type="text" placeholder="* Mennyiség"/>
                                                <label class="ms-2" for="quantity">* Mennyiség</label>
                                                @error('quantity') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('unitPrice')}}" class="form-control border-0 border-bottom" id="unitPrice"
                                                       name="unitPrice" type="text" placeholder="* Egységár"/>
                                                <label class="ms-2" for="unitPrice">* Egységár</label>
                                                @error('unitPrice') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('lineNetAmount')}}" class="form-control border-0 border-bottom"
                                                       id="lineNetAmount" name="lineNetAmount" type="text" placeholder="* Netto érték"/>
                                                <label class="ms-2" for="lineNetAmount">* Netto érték</label>
                                                @error('lineNetAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('vatPercentage')}}" class="form-control border-0 border-bottom"
                                                       id="vatPercentage" name="vatPercentage" type="text" placeholder="* ÁFA mértéke"/>
                                                <label class="ms-2" for="vatPercentage">* ÁFA mértéke</label>
                                                @error('vatPercentage') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('lineVatAmount')}}" class="form-control border-0 border-bottom"
                                                       id="lineVatAmount" name="lineVatAmount" type="text" placeholder="* ÁFA összege"/>
                                                <label class="ms-2" for="lineVatAmount">* ÁFA összege</label>
                                                @error('lineVatAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 col-md-3 form-floating mb-1">
                                                <input value="{{old('lineGrossAmount')}}" class="form-control border-0 border-bottom"
                                                       id="lineGrossAmount" name="lineGrossAmount" type="text" placeholder="* Összesen"/>
                                                <label class="ms-2" for="lineGrossAmount">* Összesen</label>
                                                @error('lineGrossAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="col-12 form-floating mb-1">
                                                <input class="btn btn-outline-primary border-0 border-bottom pt-2 pb-3 col-12 text-end"
                                                           id="submitButton" type="submit" value="Számlatétel hozzáadása"/>
                                            </div>
                                            <div>
                                                @if($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-bottom: #2d3748 solid 1px; text-align: left; width: 80%; padding: 5px">
                                Nettó
                                összeg
                            </td>
                            <td colspan="1" style="border-bottom: #2d3748 solid 1px; text-align: right; width: 20%; padding: 5px">
                                {{round($invoicehead->invoiceDetail->invoiceNetAmount)}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-bottom: #2d3748 solid 1px; text-align: left; width: 80%; padding: 5px">ÁFA
                                összege
                            </td>
                            <td colspan="1" style="border-bottom: #2d3748 solid 1px; text-align: right; width: 20%; padding: 5px">
                                {{round($invoicehead->invoiceDetail->invoiceVatAmount)}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-bottom: #2d3748 solid 1px; text-align: left; width: 80%; padding: 5px">
                                Bruttó
                                összeg
                            </td>
                            <td colspan="1" style="border-bottom: #2d3748 solid 1px; text-align: right; width: 20%; padding: 5px">
                                {{round($invoicehead->invoiceDetail->invoiceGrossAmount)}}
                            </td>
                        </tr>
                    </table>
                    <p style="width: 98%; align-content: end; text-align: right; padding: 5px">
                        <span style="text-align: right; width: 80rem; padding: 5px">Fizetendő összeg:</span>
                        <span style="text-align: right; width: 20rem; padding: 5px; font-weight: bold">{{round($invoicehead->invoiceDetail->invoiceGrossAmount)}} Ft</span>
                    </p>
                    <table style="width: 100%; border-top: #cbd5e0 solid 1px">
                        <tr style="width: 100%">
                            <td style="text-align: right; width: 100px; padding: 15px">
                                <form action="{{route('invoiceheads.destroy', ['invoicehead' => $invoicehead])}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-outline-primary mt-2" type="submit" value="Számla sztornózása">
                                </form>
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>
                <div class="col"></div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
