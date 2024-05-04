<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="new" method="POST">
    @csrf
    <div class='n-gp'>
        <p class="h-label">Name</p>
        <div class='radio-gp'>
            <input type="radio" id="p-1" name="p-name" value="p1">
            <label for="p-1">Father</label><br>
            <input type="radio" id="p-2" name="p-name" value="p2">
            <label for="p-2">Mother</label><br>
            <input type="radio" id="p-3" name="p-name" value="p3">
            <label for="p-3">Daughter</label><br>
            <input type="radio" id="p-4" name="p-name" value="p4">
            <label for="p-4">Son</label><br>

            <input type="radio" id="expense" name="e-or-i" value="e">
            <label for="expense">Expense</label><br>
            <input type="radio" id="income" name="e-or-i" value="i">
            <label for="income">Income</label><br>
        </div>
    </div>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount">MMK<br><br>
    <label for="des">Description:</label>
    <input type="text" id="des" name="description"><br><br>

    <input type="submit">
    </form>
</body>
</html>