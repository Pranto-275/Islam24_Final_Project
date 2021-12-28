<style>
    #prayer-container {
        width: 300px;
        text-align: center;
    }
    .prayer_time {
        font-size: 1.6em;
        font-weight: 800;
    }
    #prayer-container #prayer_city {
        font-size: 1.2em;
        font-weight: 800;
    }
    #prayer-container table {
        width: 100%
    }
    #prayer-container tbody tr:nth-child(odd) {
        background-color: #f3f3f3;
    }
    #prayer-container tbody td {
        padding: 10px 20px;
    }
    #prayer-container tbody td:nth-child(1) {
        text-align: left;
    }
    #prayer-container tbody td:nth-child(2) {
        text-align: right;
    }
    </style>
<div style="margin:auto; border:1px solid #c0c0c0" id="prayer-container">
    <div class="prayer_time">Prayer Times</div>
    <div id="prayer_city"></div>
    <div id="prayer_date"></div>
    <div id="prayer_clock"></div>
    <table>
        <tbody>
            <tr>
                <td>Imsak</td>
                <td id="Imsak"></td>
            </tr>
            <tr>
                <td>Fajr</td>
                <td id="Fajr"></td>
            </tr>
            <tr>
                <td>Dhuhr</td>
                <td id="Dhuhr"></td>
            </tr>
            <tr>
                <td>Asr</td>
                <td id="Asr"></td>
            </tr>
            <tr>
                <td>Maghrib</td>
                <td id="Maghrib"></td>
            </tr>
            <tr>
                <td>Isha</td>
                <td id="Isha"></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    var api_url = 'https://api.pray.zone/v2/times/today.json?city=dhaka&start=2021-12-18&end=2021-12-28&timeformat=1';
    document.addEventListener("DOMContentLoaded", function () {
        PrayerTimesApi();
    });

    function PrayerTimesApi() {
    var userLang = navigator.language || navigator.userLanguage;
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                var prayer_results = JSON.parse(request.responseText);
                console.log(JSON.stringify(prayer_results.results.location.local_offset));
                var prayer_date = new Date(prayer_results.results.datetime[0].date.gregorian);

                var local_offset = prayer_results.results.location.local_offset;
                document.getElementById("prayer_city").innerHTML = prayer_results.results.location.city;
                document.getElementById("prayer_date").innerHTML = prayer_date.toLocaleDateString(userLang, options);
                document.getElementById("Imsak").innerHTML = prayer_results.results.datetime[0].times.Imsak;
                document.getElementById("Fajr").innerHTML = prayer_results.results.datetime[0].times.Fajr;
                document.getElementById("Dhuhr").innerHTML = prayer_results.results.datetime[0].times.Dhuhr;
                document.getElementById("Asr").innerHTML = prayer_results.results.datetime[0].times.Asr;
                document.getElementById("Maghrib").innerHTML = prayer_results.results.datetime[0].times.Maghrib;
                document.getElementById("Isha").innerHTML = prayer_results.results.datetime[0].times.Isha;
                SetTheClock(local_offset);

            } else {
                console.log('An error occurred during your request: ' + request.status + ' ' + request.statusText);
            }
        }
    };
    request.open('Get', api_url, true);
    request.send();
}
function time(offset) {
    var location_date = new Date(new Date().getTime() + (offset * 60000));
    var hours = location_date.getUTCHours(),
        minutes = location_date.getUTCMinutes(),
        seconds = location_date.getUTCSeconds();
    hours = addZero(hours);
    minutes = addZero(minutes);
    seconds = addZero(seconds);
    document.getElementById("prayer_clock").innerHTML = hours + ':' + minutes + ':' + seconds;
}
function addZero(val) {
    return (val <= 9) ? ("0" + val) : val;
}
function SetTheClock(local_offset) {
    time(local_offset);
    setInterval(function () { time(local_offset); }, 1000);
}

</script>
