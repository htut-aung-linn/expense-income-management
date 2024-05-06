<div class="eishowgp">
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <p class="name">{{$name}}</p>
    <div class="iegp">
        <div id='{{$name}}in' class="income" style="width:{{$income}}%;"></div>
        <div id='{{$name}}out' class="expense" style="width:{{$outcome}}%;"></div>
    </div>
    <script>
        document.getElementById('{{$name}}in').addEventListener("touchstart", function() {
            startPress('{{round($income*$max/100)}}');
        });
        
        document.getElementById('{{$name}}in').addEventListener("touchend", endPress );
        document.getElementById('{{$name}}out').addEventListener("touchstart", function() {
            startPress('{{round($outcome*$max/100)}}');
        });
        document.getElementById('{{$name}}out').addEventListener("touchend", endPress);
    </script>
</div>