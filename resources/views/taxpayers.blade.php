Adózók
<hr>
<table>
    <thead>
    <tr>
        <th>Eladó neve</th>
        <th>Bankszámlaszám</th>
        <th>Lakcím</th>
        <th colspan="2">Műveletek</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taxpayers as $taxpayer)
        <tr>
            <td>
                <a href="{{ route('taxpayers.show', ['taxpayer' => $taxpayer]) }}">
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
                <a href="{{ route('taxpayers.edit', ['taxpayer' => $taxpayer]) }}">
                    Szerkesztés
                </a>
            </td>
            <td>
                <a href="{{ route('taxpayers.destroy', ['taxpayer' => $taxpayer]) }}">
                    Törlés
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
