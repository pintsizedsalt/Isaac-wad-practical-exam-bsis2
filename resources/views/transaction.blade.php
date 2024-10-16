<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Page</title>
</head>
<body>
    <h1>Transaction Page</h1>
        <div>Transaction Title: {{ $transaction->transaction_title }}</div>
        <div>Description: {{ $transaction->description }}</div>
        <div>Status: {{ $transaction->status }}</div>
        <div>Total Amount: {{ $transaction->total_amount }}</div>
        <div>Transaction No.: {{ $transaction->transaction_number }}</div>
    <hr>
    <form action="{{ route('deleteTransaction', ['id' => $transaction->id])}}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this transaction?')">
        @csrf 
        @method('DELETE')
        <button type="submit">Delete Transaction</button>
    </form>

    <form action="{{ route('editTransaction', ['id' => $transaction->id]) }}" method="GET">
    <button type="submit">Edit Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back to Transactions</button>
    </form>
</body>
</html>