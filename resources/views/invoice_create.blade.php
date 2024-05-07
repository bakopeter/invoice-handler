@use(App\Models\TaxPayer)
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Számla hozzáadása</title>
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
<div class="container p-4 my-4 bg-body-tertiary">
    <h4 class="mb-3">Számla adatai</h4>
    <div style="display:{{$display ?? 'none'}}" class="display-7">
        <div class="alert alert-danger" role="alert">{{$message ?? null}}</div>
    </div>
    <form action="{{route('invoiceheads.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-md-6 form-floating mb-3">
                <select class="form-select" id="supplierTP" name="supplierTP" aria-label="* Eladó">
                    @foreach(TaxPayer::all()->whereNotNull('taxnumber_id') as $supplier)
                    <option value="{{$supplier->id}}" @selected(old('supplierTP') == $supplier)>{{$supplier->taxPayerName}}</option>
                    @endforeach
                </select>
                <label class="ms-2" for="supplierTP">* Eladó</label>
                @error('supplierTP') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-6 form-floating mb-3">
                <select class="form-select" id="customerTP" name="customerTP" aria-label="* Vevő">
                    @foreach(TaxPayer::all() as $customer)
                    <option value="{{$customer->id}}" @selected(old('customerTP') == $customer)>{{$customer->taxPayerName}}</option>
                    @endforeach
                </select>
                <label class="ms-2" for="customerTP">* Vevő</label>
                @error('customerTP') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-6 form-floating mb-3">
                <input value="{{old('invoiceNumber')}}" class="form-control" id="invoiceNumber" name="invoiceNumber"
                       type="text" placeholder="* Számla sorszáma"/>
                <label class="ms-2" for="invoiceNumber">* Számla sorszáma</label>
                @error('invoiceNumber') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-6 form-floating mb-3">
                <select class="form-select" id="invoiceDetail->paymentMethod" name="invoiceDetail->paymentMethod" aria-label="Fizetés módja">
                    <option value="CARD" @selected(old('invoiceDetail->paymentMethod') == 'CARD')>Bankkártya</option>
                    <option value="TRANSFER" @selected(old('invoiceDetail->paymentMethod') == 'TRANSFER')>Banki utalás</option>
                    <option value="CASH" @selected(old('invoiceDetail->paymentMethod') == 'CASH')>Készpénz</option>
                    <option value="VOUCHER" @selected(old('invoiceDetail->paymentMethod') == 'VOUCHER')>Utalvány</option>
                </select>
                <label class="ms-2" for="invoiceDetail->paymentMethod">Fizetés módja</label>
                @error('invoiceDetail->paymentMethod') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceIssueDate')}}" class="form-control" id="invoiceIssueDate"
                       name="invoiceIssueDate" type="date" placeholder="* Számla kelte"/>
                <label class="ms-2" for="invoiceIssueDate">* Számla kelte</label>
                @error('invoiceIssueDate') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceDetail->invoiceDeliveryDate')}}" class="form-control" id="invoiceDetail->invoiceDeliveryDate"
                       name="invoiceDetail->invoiceDeliveryDate" type="date" placeholder="* Teljesítés dátuma"/>
                <label class="ms-2" for="invoiceDetail->invoiceDeliveryDate">* Teljesítés dátuma</label>
                @error('invoiceDetail->invoiceDeliveryDate') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceDetail->paymentDate')}}" class="form-control" id="invoiceDetail->paymentDate"
                       name="invoiceDetail->paymentDate" type="date" placeholder="* Fizetési határidő"/>
                <label class="ms-2"  for="invoiceDetail->paymentDate">* Fizetési határidő</label>
                @error('invoiceDetail->paymentDate') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceDetail->invoiceNetAmount')}}" class="form-control" id="invoiceDetail->invoiceNetAmount"
                       name="invoiceDetail->invoiceNetAmount" type="text" placeholder="* Nettó összeg"/>
                <label class="ms-2" for="invoiceDetail->invoiceNetAmount">* Nettó összeg</label>
                @error('invoiceDetail->invoiceNetAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceDetail->invoiceNetAmount')}}" class="form-control" id="invoiceDetail->invoiceVatAmount"
                       name="invoiceDetail->invoiceVatAmount" type="text" placeholder="* ÁFA összege"/>
                <label class="ms-2" for="invoiceDetail->invoiceVatAmount">* ÁFA összege</label>
                @error('invoiceDetail->invoiceVatAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 col-md-4 form-floating mb-3">
                <input value="{{old('invoiceDetail->invoiceGrossAmount')}}" class="form-control" id="invoiceDetail->invoiceGrossAmount"
                       name="invoiceDetail->invoiceGrossAmount" type="text" placeholder="* Bruttó összeg"/>
                <label class="ms-2" for="invoiceDetail->invoiceGrossAmount">* Bruttó összeg</label>
                @error('invoiceDetail->invoiceGrossAmount') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="col-12 form-floating mb-3">
                    <div class="">
                        <input class="btn btn-outline-primary mt-2" id="submitButton" type="submit"
                               value="Adatok elküldése"/>
                    </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>
</html>
