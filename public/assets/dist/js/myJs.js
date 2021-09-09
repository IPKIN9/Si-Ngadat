$(document).ready(function(){
    getdate();
    setInterval(getdate, 1000);
    function getdate(){
       var day = ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
       var today = new Date();
       var h = today.getHours();
       var m = today.getMinutes();
       var s = today.getSeconds();
       var d = day[today.getDay()];
        if(s<10){
            s = "0"+s;
        }

       $(".digital-clock").text(d+" | "+h+" : "+m+" : "+s);
        setTimeout(function(){getdate()}, 500);
    }
});