<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Page</title>
</head>
<body>
    <h1>Transactions Page</h1>

    <form action="{{ route('createTransaction') }}" method="GET">
        @method('GET')
        <button type="submit">Create Transaction</button>
    </form>

    @foreach ($transactions as $transaction)
        <div>Transaction Title: {{ $transaction->transaction_title }}</div>
        <div>Description: {{ $transaction->description }}</div>
        <div>Status: {{ $transaction->status }}</div>
        <div>Total Amount: {{ $transaction->total_amount }}</div>
        <div>Transaction No.: {{ $transaction->transaction_number }}</div>

        <form action="{{ route('viewTransaction', ['id' => $transaction->id]) }}" method="GET">
            <button type="submit">View This Transaction</button>
        </form>
        <hr>
    @endforeach
</body>
</html>