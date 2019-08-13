//JavaScript logic file

function addHut(name, address, rooms, extras, price) {


    if (name.length == 0 || address.length == 0 || rooms.length == 0 || extras.length == 0 || price.length == 0) {
        window.alert("All fields are required");
        return;
    } else {
        var http = new XMLHttpRequest();
        var url = '../../Requests/RequestHut.php';
        var params = "name=" + name + "&address=" + address + "&rooms=" + rooms + "&extras=" + extras + "&price=" + price;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                console.log(this.responseText);
                alert(this.responseText);
            }
        }

        http.send(params);
    }

}

function makeReservation(first_name, last_name, email, phone, from, to, hut) {


    if (first_name.length == 0 || last_name.length == 0 || email.length == 0 || phone.length == 0 || from.length == 0 || to.length == 0 || hut.length == 0) {
        window.alert("All fields are required");
        return;
    } else {
        var http = new XMLHttpRequest();
        var url = '../../Requests/RequestReservation.php';
        var params = "first_name=" + first_name + "&last_name=" + last_name + "&email=" + email + "&phone=" + phone + "&from=" + from + "&to=" + to + "&hut=" + hut;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                alert(this.responseText);
            }
        }

        http.send(params);
    }

}

function showPrice(from, to, hut) {
    if (from.length == 0 || to.length == 0 || hut.length == 0) {
        document.getElementById("price").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("offer").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../Requests/RequestPrice.php?f=" + from + "&t=" + to + "&h=" + hut, true);
        xmlhttp.send();
    }
}

function filterData(hutId, daysStay, capacity, payDay, priceForDay) {
    var http = new XMLHttpRequest();
    var url = '../../Requests/RequestNewFilter.php';
    var params = "hutId=" + hutId + "&daysStay=" + daysStay + "&capacity=" + capacity + "&payDay=" + payDay + "&priceForDay=" + priceForDay;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            console.log(hutId, daysStay, capacity, payDay, priceForDay);
            document.getElementById("filterData").innerHTML = this.responseText;
        }
    }

    http.send(params);
}
