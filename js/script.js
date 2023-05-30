var Thetime = new Date()
var mins = Thetime.getMinutes();
var time = Thetime.getHours();

// var time = 18

if(time >= 19 && time <= 24){
    time -=  12;
    document.getElementById("time").innerHTML = "Good Evening" + "<br/>" + "The time is " + time + ":" + mins + "pm";
}
else if(time >= 1 && time <= 12){
    // time -=  12;
    document.getElementById("time").innerHTML = "Good Morning" + "<br/>" + "The time is " + time + ":" + mins + "pm";
}
else if(time >= 12 && time <= 19){
    time -=  12;
    document.getElementById("time").innerHTML = "Good Afternoon" + "<br/>" + "The time is " + time + ":" + mins + "pm";
}