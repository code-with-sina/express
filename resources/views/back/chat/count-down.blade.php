

<div class="w-100 d-block">
    <div class="d-flex justify-content-center" id="countedTime">
        <span id="hours" class="status-time">1</span>
        <span id="minutes" class="status-time">2</span>
        <span  class="d-flex align-items-center">:</span>
        <!-- <span id="" class="status-time">2</span> -->
        <span id="seconds" class="status-time">6</span>
    </div>
</div>


<script>
    var count_id = "{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $props->express_binding_detail_end_time) }}";
    var countDownDate = new Date(count_id).getTime();
    var x = setInterval(function(){
        var  now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance %(1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance %(1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance %(1000 * 60)) / (1000));
        document.querySelector("#hours").innerText = hours;
        document.querySelector("#minutes").innerText = minutes;
        document.querySelector("#seconds").innerText = seconds;
        if(distance < 0) {
            clearInterval(x);
            document.querySelector("#hours").innerText = '';
            document.querySelector("#minutes").innerText = '';
            document.querySelector("#seconds").innerText = '';
            document.querySelector("#countedTime").innerText = "TRANSACTION DURATION EXPIRED";
        }
    }, 1000);
</script>