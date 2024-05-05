<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-back/>
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
            <label for="p-4">Son</label><br><br><br>

            <input  class="m-top" type="radio" id="expense" name="e-or-i" value="e">
            <label for="expense">Expense</label><br>
            <input type="radio" id="income" name="e-or-i" value="i">
            <label for="income">Income</label><br>
        </div>
    </div>
    <label for="amount">Amount(MMK):</label>
    <input class="f-w" type="number" id="amount" name="amount"><br><br>
    <label for="des">Description:</label>
    <input class="f-w" type="text" id="des" name="description"><br><br>

    <input type="submit" id="submit">
    </form>
</body>

<style>
    body{
        background-color: #000;
        display : flex;
        flex-direction : column;
        align-items: center;
    }
    form{
        width: 430px;
        height: auto;
        background-color: #fff;
        /* Group 8657 */
        border-radius: 2rem;
        padding-bottom : 5rem;
    }

    .h-label , label{
        font-size: 2rem;
        margin : 0.2em;
    }

    .n-gp{
        display : flex;
        flex-direction : row;
        justify-content: space-between;
        padding : 1em;
    }

    input{
        font-size: 1.5rem;
        margin: 0.2em;
        background-color: #E6E6E6;
    }

    
    #submit{
        background-color: #24FF00;
/* Rectangle 4024 */

        position: relative;
        width: 150px;
        height: 60px;
        left: 230px;


    }

    .f-w{
        width: 95%;
    }
    input[type="radio"] {
        width: 30px;
        height: 30px;
    }
</style>
</html>