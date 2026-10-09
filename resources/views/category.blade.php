@foreach ($cats as $cat => $price)
    <li>{{ $cat }}: ${{ $price }}</li>
@endforeach