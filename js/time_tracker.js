var hours = 0;
var mins = 0;
var seconds = 0;

$('input[name=dayResults]').val(currentDate());

$('#startStop').click(function () {
    if ($('#startStop').text() == 'Start') {
        $('input[name=day]').val(currentDate());
        $('#startStop').text('Stop');
        startTimer();
    }
    else {
        $('#startStop').text('Start');
        clearTimeout(timex);
    }
});

$('#reset').click(function () {
    hours = 0; mins = 0; seconds = 0;
    $('#hours', '#mins').html('00:');
    $('#seconds').html('00');
});

$('#finish').click(function () {
    var finalTime = hours +':' + mins + ':' + seconds;
    $('input[name=time]').val(finalTime);
});

function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

function currentDate() {
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();

    dd = addZero(dd);
    mm = addZero(mm);

    return dd + '/' + mm + '/' + yyyy;
}
function startTimer() {
    timex = setTimeout(function () {
        seconds++;
        if (seconds > 59) {
            seconds = 0; mins++;
            if (mins > 59) {
                mins = 0; hours++;
                if (hours < 10) { $("#hours").text('0' + hours + ':') } else $("#hours").text(hours + ':');
            }
            if (mins < 10) {
                $("#mins").text('0' + mins + ':');
            }
            else $("#mins").text(mins + ':');
        }
        if (seconds < 10) {
            $("#seconds").text('0' + seconds);
        } else {
            $("#seconds").text(seconds);
        }


        startTimer();
    }, 1000);
}

