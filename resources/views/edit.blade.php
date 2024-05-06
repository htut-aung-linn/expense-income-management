<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <x-back/>
    <form action="/editConfirm" method="POST">
    @csrf
    <input type="text" id="id" name="ID" value="{{$data['ID']}}" required style="display:none;">
    <div class='n-gp'>
        <p class="h-label">Name</p>
        <div class='radio-gp'>
            <input type="radio" id="p-1" name="p-name" value="p1" 
            @if($data['Name']=='p1')
            checked
            @endif
            >
            <label for="p-1">Father</label><br>
            <input type="radio" id="p-2" name="p-name" value="p2"
            @if($data['Name']=='p2')
            checked
            @endif>
            <label for="p-2">Mother</label><br>
            <input type="radio" id="p-3" name="p-name" value="p3"
            @if($data['Name']=='p3')
            checked
            @endif>
            <label for="p-3">Daughter</label><br>
            <input type="radio" id="p-4" name="p-name" value="p4"
            @if($data['Name']=='p4')
            checked
            @endif>
            <label for="p-4">Son</label><br><br><br>

            <input  class="m-top" type="radio" id="expense" name="e-or-i" value="e" checked>
            <label for="expense">Expense</label><br>
            <input type="radio" id="income" name="e-or-i" value="i"
            @if($data['EorI']=='0')
            checked
            @endif
            >
            <label for="income">Income</label><br>
        </div>
    </div>

    <label for="amount">Amount(MMK):</label>
    <input class="f-w" type="number" id="amount" name="amount" value="{{$data['Amount']}}" required><br><br>
    <label for="des">Description:</label>
    <input class="f-w" type="text" id="des" name="description" value="{{$data['Description']}}"><br><br>

    <input type="submit" id="submit">
    <svg id="del-btn" width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 15L10 12" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
        <path d="M14 15L14 12" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
        <path d="M3 7H21V7C20.0681 7 19.6022 7 19.2346 7.15224C18.7446 7.35523 18.3552 7.74458 18.1522 8.23463C18 8.60218 18 9.06812 18 10V16C18 17.8856 18 18.8284 17.4142 19.4142C16.8284 20 15.8856 20 14 20H10C8.11438 20 7.17157 20 6.58579 19.4142C6 18.8284 6 17.8856 6 16V10C6 9.06812 6 8.60218 5.84776 8.23463C5.64477 7.74458 5.25542 7.35523 4.76537 7.15224C4.39782 7 3.93188 7 3 7V7Z" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
        <path d="M10.0681 3.37059C10.1821 3.26427 10.4332 3.17033 10.7825 3.10332C11.1318 3.03632 11.5597 3 12 3C12.4403 3 12.8682 3.03632 13.2175 3.10332C13.5668 3.17033 13.8179 3.26427 13.9319 3.37059" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
    </svg>

    </form>
    <div id="delete-popup" style="display:none;">
        <p id="warn">Do you want to delete this?</p>
        <div id="btn-gp">
            <button class="button" style="background-color: #24FF00;" onclick="cancle()">Cancle</button>
            <a href="/delete/{{$data['ID']}}" class="button" style="background-color: #FF0000;">Confirm</a>
        </div>
    </div>
    <script>
        function del(){
            document.getElementById("delete-popup").style.display = "block";
        }   
        function cancle(){
            document.getElementById("delete-popup").style.display = "none";
        } 
        
        document.getElementById('del-btn').addEventListener("click", del);
    </script>
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
        position: relative;
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

    input[type="submit"] {
        border-radius: 20px;
    }
    #del-btn{
        position: absolute;
        bottom: 25px;
        left: 25px;
    }
    #delete-popup{
        position: absolute;
        top: 400px;
        padding: 2rem;
        border-radius: 20px;
        background-color: #fff;
    }
    #warn{
        font-size: 2rem;
    }
    #btn-gp{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .button{
        font-size: 1.5rem;
        margin : 0.5rem;
        border-radius: 20px;
        padding : 0.5rem;
    }
</style>
</html>