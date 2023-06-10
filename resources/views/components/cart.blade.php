
@props(['products'])

<table class="table table-hover" style="border:1px solid lightgray">
    <thead style="height:89px">
        <tr>
          <th scope="col">יחידות</th>
          <th scope="col">שם המוצר &nbsp;&nbsp;&nbsp;&nbsp;</th>
          <th scope="col">סיכום</th>
          <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $products as $product )

                <tr>
                    <th scope="row">{{ $product->qty }}</th>
                    <td>{{ $product->name }}</td>
                    <td>₪{{ $product->price }}</td>
                    <td><img src="https://img.icons8.com/?size=512&id=11705&format=png" alt="Logo" width="30" height="24"/></td>
                </tr>

        @endforeach
    </tbody>
</table>


