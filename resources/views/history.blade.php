<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>

    <x-back/>
    
    @foreach($hdata as $item)
        
        <x-item id="{{$item['ID']}}" name="{{$item['Name']}}"
        description="{{$item['Description']}}" amount="{{$item['Amount']}}" eori="{{$item['EorI']}}" date="{{$item['Date']}}"/>
    @endforeach
    @if($count>5 && $count>$current-5)
    <div id="more-gp">
        
        <a href="/History/{{$current}}"><p id="more">More</p></a>
         
    </div>
    @endif
</body>
<style>
    body{
        background-color: #000;
        display : flex;
        flex-direction : column;
        align-items: center;
    }
    .item{
        width: 430px;
        background : #fff;
        margin-bottom : 1rem;
        border-radius: 1rem;
        position: relative;
        padding-bottom : 0.5rem;
    }
    .i-label{
        font-size: 1.5rem;
        margin : 0em;
        margin-left: 0.5em;
        margin-top: 0.3em;
    }
    .date, .edit, .eori{
        position: absolute;
    }
    .date{
        top: 1px;
        right: 80px;
    }
    .edit{
        bottom: 1px;
        right:10px;
    }
    .eori{
        width: 63px;
        height: 27px;
        background-color: #FF1D1D;
        top: 13px;
        right: 15px;
        border-radius: 14px;
    }
    #more-gp{
        margin : 0.5rem;
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-top : 0.2rem;
    }

    #more{
        padding:0.5rem 2rem;
        border:#42FF00 2px solid;
        border-radius: 28px;
        font-size: 1.5rem;
        background : #fff;
    }
    .green{
        background-color: #42FF00;

    }

</style>
</html>