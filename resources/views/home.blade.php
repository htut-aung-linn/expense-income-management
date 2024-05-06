<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="first">
        <div id="heading">
            <a href="/History/5"><svg width="60" height="60" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.75 14.5833L27.0833 14.5833" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
            <path d="M18.75 31.25L25 31.25" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
            <path d="M18.75 22.9167L31.25 22.9167" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
            <path d="M39.5833 22.9167V12.25C39.5833 9.42157 39.5833 8.00736 38.7047 7.12868C37.826 6.25 36.4118 6.25 33.5833 6.25H16.4167C13.5882 6.25 12.174 6.25 11.2954 7.12868C10.4167 8.00736 10.4167 9.42157 10.4167 12.25V37.75C10.4167 40.5784 10.4167 41.9926 11.2954 42.8713C12.174 43.75 13.5882 43.75 16.4167 43.75H25" stroke="#33363F" stroke-width="2"/>
            <circle cx="36.4583" cy="36.4583" r="5.20833" stroke="#33363F" stroke-width="2"/>
            <path d="M43.75 43.75L40.625 40.625" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
            </svg></a>

            <h2>Daily Expense</h2>
            <a href="/newInfo"><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.5 11.5C7.5 9.29086 9.29086 7.5 11.5 7.5H48.5C50.7091 7.5 52.5 9.29086 52.5 11.5V48.5C52.5 50.7091 50.7091 52.5 48.5 52.5H11.5C9.29086 52.5 7.5 50.7091 7.5 48.5V11.5Z" stroke="#222222" stroke-width="2"/>
            <path d="M30 20L30 40" stroke="#222222" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
            <path d="M40 30L20 30" stroke="#222222" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
            </svg></a>
        </div>
        <h1>Total Balance</h1>
        <label>{{$total}} MMK</label>
        <form id="dateForm" action="/" method="get">
        <div class="date">
            <label>From:</label>
            <input type="date" id="fromDate" name="fromDate" value="{{$startDate}}">

        </div>
        <div class="date">
            <label>To:</label>
            <input type="date" id="toDate" name="toDate" value="{{$endDate}}">

        </div>
    </form>
    </div>
    <script>
    // Function to be called after choosing date
        function handleDateSelection() {
            // Submit the form
            document.getElementById("dateForm").submit();
        }

        // Add event listener for date input change event
        document.getElementById("fromDate").addEventListener("change", handleDateSelection);
        document.getElementById("toDate").addEventListener("change", handleDateSelection);

        function startPress(price) {
        // Show the hidden text
            document.getElementById("amount").innerHTML= price + "MMK";
            document.getElementById("amount").style.display = "block";
        }

        function endPress() {
        // Show the hidden text
            document.getElementById("amount").style.display = "none";
        }
    </script>

    <div class="distribute">
        <p id="amount">2000 MMk</p>
        <x-enishow name="Father" outcome="{{$p1e}}" income="{{$p1i}}" max="{{$max}}"/>
        <x-enishow name="Mother" outcome="{{$p2e}}" income="{{$p2i}}" max="{{$max}}"/>
        <x-enishow name="Daughter" outcome="{{$p3e}}" income="{{$p3i}}" max="{{$max}}"/>
        <x-enishow name="Son" outcome="{{$p4e}}" income="{{$p4i}}" max="{{$max}}"/>
    </div>



</body>
<style>
    body{
        background-color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .first{
        width: 430px;
        background-color: #fff;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 2rem;
    }
    #heading{
        display:flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    h2{
        color:#460057;
    }
    label{
        font-size : 1.5rem;
    }
    input{
        font-size : 1.5rem;
        margin: 0.5rem
    }
    .distribute{
        background-color: #fff;
        width: 430px;
        padding-top: 2rem;
        padding-bottom: 2rem;
        margin-top:2rem;
        border-radius: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }
    .eishowgp{
        display:flex;
        flex-direction: row;
        align-items: left;
        width: 90%;
        margin: 0.5rem;
    }
    .name{
        font-size: 1.5rem;
        margin-top: 0.2em;
        width : 112px;
    }
    .iegp{
        width : 70%;
        height: 80px;
    }
    .income, .expense{
        height: 20px;
        margin: 0.5rem;
    }
    .income{
        background-color: #24FF00;
    }
    .expense{
        background-color: #FF0000;
    }
    a{
        text-decoration: none;
    }
    #amount{
        display: none;
        position: absolute;
        width: 100px;
        text-align: center;
        font-size: 1.5rem; 
        top: 0px;
    }
</style>
</html>