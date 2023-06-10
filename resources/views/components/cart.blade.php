
@props(['products'])

<table class="table table-hover" style="border:1px solid lightgray">
    <thead style="height:90px">
        <tr>
          <th scope="col">יחידות</th>
          <th scope="col">שם המוצר &nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">סיכום</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $products as $product )
            @if ( $product->qty > 0 )
                <tr>
                    <th scope="row">{{ $product->qty }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endif

        @endforeach

    </tbody>
</table>
