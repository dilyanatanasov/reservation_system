<?php
/**
 * Created by PhpStorm.
 * User: Dilyan
 * Date: 2/4/2019
 * Time: 6:53 PM
 */

require_once '../../DB/HutsDB.php';

?>

<html>
    <head>
        <title>Hut Reservation System</title>
        <link rel="stylesheet" type="text/css" href="../css/hutReservation.css">
        <script src="../js/script.js"></script>
    </head>
    <body>
        <main>
            <section id="addHut">
                <h2>Hut</h2>
                <div>
                    <form>
                        <input type="text" name="name" id="name" placeholder="Name">
                        <input type="text" name="address" id="address" placeholder="Address">
                        <input type="number" name="rooms" id="rooms" placeholder="№ of Rooms">
                        <input type="textarea" name="extras" id="extras" placeholder="Extras">
                        <input type="text" name="price" id="price" placeholder="Price for a Day">
                        <button type="button" onclick="addHut(
                            document.getElementById('name').value,
                            document.getElementById('address').value,
                            document.getElementById('rooms').value,
                            document.getElementById('extras').value,
                            document.getElementById('price').value)">
                            Add New Hut
                    </form>
                </div>
            </section>
            <section id="addReservation">
                <h2>Reservation</h2>
                <div>
                    <form>
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                        <input type="email" name="email" id="email" placeholder="E-mail">
                        <input type="text" name="phone" id="phone" placeholder="Phone Number">
                        <input type="date" name="from" id="from" onchange="showPrice(document.getElementById('from').value, document.getElementById('to').value, document.getElementById('hut').value)">
                        <input type="date" name="to" id="to" onchange="showPrice(document.getElementById('from').value, document.getElementById('to').value, document.getElementById('hut').value)">
                        <select name="hut" id="hut" onchange="showPrice(document.getElementById('from').value, document.getElementById('to').value, document.getElementById('hut').value)">
                            <option value=""></option>
                            <?php

                                $huts = new HutsDB();
                                $result = $huts->getHutNames();

                                foreach ($result as $hut){
                                    echo "<option value='$hut[id_hut]'>$hut[name]</option>";
                                }

                            ?>
                        </select>
                        <p id="offer"></p>
                        <button type="button" onclick="makeReservation(
                                document.getElementById('first_name').value,
                                document.getElementById('last_name').value,
                                document.getElementById('email').value,
                                document.getElementById('phone').value,
                                document.getElementById('from').value,
                                document.getElementById('to').value,
                                document.getElementById('hut').value,
                                document.getElementById('price').value)">
                                Reserve
                        </button>
                    </form>
                </div>
            </section>
            <section id="filter">
                <h2>Filter</h2>
                <div>
                    <form>
                        <select name="hutName" id="hutId" placeholder="Name of Hut">
                            <?php
                                echo "<option value=''></option>";
                                foreach ($result as $hut){
                                    echo "<option value='$hut[id_hut]'>".$hut['name']."</option>";
                                }

                            ?>
                        </select>
                        <input type="text" name="daysStay" id="daysStay" placeholder="Days Stay">
                        <input type="text" name="capacity" id="capacity" placeholder="Rooms Count">
                        <input type="date" name="payDay" id="payDay" placeholder="Pay Day">
                        <input type="text" name="priceForDay" id="priceForDay" placeholder="Price For Day or Bellow">
                        <button type="button" onclick="filterData(
                                document.getElementById('hutId').value,
                                document.getElementById('daysStay').value,
                                document.getElementById('capacity').value,
                                document.getElementById('payDay').value,
                                document.getElementById('priceForDay').value)">Search
                        </button>
                    </form>
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Hut Name</th>
                                <th>Days Stay</th>
                                <th>Room Number</th>
                                <th>Pay Day</th>
                                <th>Price For Day</th>
                            <tr>
                        </thead>
                        <tbody id="filterData">
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </body>
</html>
