<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mobil-IN | 2022</title>
  <style>
    body{
      font-family: sans-serif;
      font-size: 11pt;
    }

    td{
      font-size: 10pt;
    }
  </style>
</head>
<body>
  
  <div>
      <h3>{{ $title = 'Payment - Reports'}}</h3>

      <p class="float-start font-medium">Tanggal : {{ now() }}</p>
      <table border="1" style="border-collapse: collapse;" cellpadding="3">
        <thead>
          <tr>
            <th>TXID</th>
            <th>Game Name</th>
            <th>IDGameApp</th>
            <th>Comments</th>
            <th>Order Date</th>
            <th>Updated By</th>
            <th>Total</th>
            <th>Satus</th>
          </tr>
        </thead>
        <tbody>
          @if ($arrays->count() != 0)
            @foreach ($arrays as $item)    
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->credit->game->name }}</td>
              <td>{{ $item->IDGameApp }}</td>
              <td>{{ $item->comments }}</td>
              <td>{{ $item->order_date }}</td>
              <td>{{ ($item->user_id == null) ? 'NULL' : $item->user->name }}</td>
              <td>Rp. {{ number_format($item->total) }}</td>
              <td class="text-center">
                @if ($item->status == 'unpaid')
                  <span style="color: danger" class="btn btn-danger btn-sm">Belum terbayar</span>
                @else
                  <span style="color: green" class="btn btn-success btn-sm">Terbayar</span>
                @endif
              </td>
            </tr>
            @endforeach
          @else
            <td colspan="8" style="text-align: center">No Data</td>
          @endif
        </tbody>
      </table>

    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>