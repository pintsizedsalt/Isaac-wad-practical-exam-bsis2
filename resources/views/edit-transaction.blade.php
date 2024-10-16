<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
</head>
<body>
    <h1>Edit Transaction</h1>
    <form action="{{ route('updateTransaction', ['id' => $transaction->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="transaction_title">Transaction Title:</label>
        <input type="text" id="transaction_title" name="transaction_title" value="{{ $transaction->transaction_title }}" required><br>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $transaction->description }}" required><br>
        
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="successful" {{ $transaction->status == 'successful' ? 'selected' : '' }}>Success</option>
            <option value="declined" {{ $transaction->status == 'declined' ? 'selected' : '' }}>Declined</option>
        </select><br>
        
        <label for="total_amount">Total Amount:</label>
        <input type="number" id="total_amount" name="total_amount" step="0.01" value="{{ $transaction->total_amount }}" required><br>
        
        <label for="transaction_number">Transaction Number:</label>
        <input type="text" id="transaction_number" name="transaction_number" value="{{ $transaction->transaction_number }}" required><br>
        
        <button type="submit">Update Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        <button type="submit">Back to Transactions</button>
    </form>
    
</body>
</html>
