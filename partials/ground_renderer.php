<?php

if (!isset($_SESSION['current_gameground_position'] )) {
	$_SESSION['current_gameground_position'] = -1;
}


// initially, we start at the -1 position if the variable isn't set
//if (!isset($_SESSION['current_gameground_position'] )) {
//	$_SESSION['current_gameground_position'] = -1;
//	?>
<!---->
<!--    <div class="section-header">-->
<!--        <p>Играта започва.</p>-->
<!--    </div>-->
<?php
//}

if ($_SESSION['current_gameground_position'] > 11) {
	$_SESSION['current_gameground_position'] -= 12;
}

$position = $_SESSION['current_gameground_position'];

if ($position == -1) {

//    <div class="section-header">
//        <p>Вашият ход ще влезе в сила при следващо хвърляне.</p>
//    </div>

}
if ($position == 0) { ?>
	<img src="./images/gameground/gameground_state_0.png" alt="">
    <br><br>
<?php }
if ($position == 1) { ?>
	<img src="./images/gameground/gameground_state_1.png" alt="">
    <br><br>
<?php }
if ($position == 2) { ?>
	<img src="./images/gameground/gameground_state_2.png" alt="">
    <br><br>
<?php }
if ($position == 3) { ?>
	<img src="./images/gameground/gameground_state_3.png" alt="">
    <br><br>
<?php }
if ($position == 4) { ?>
	<img src="./images/gameground/gameground_state_4.png" alt="">
    <br><br>
<?php }
if ($position == 5) { ?>
	<img src="./images/gameground/gameground_state_5.png" alt="">
    <br><br>
<?php }
if ($position == 6) { ?>
	<img src="./images/gameground/gameground_state_6.png" alt="">
    <br><br>
<?php }
if ($position == 7) { ?>
	<img src="./images/gameground/gameground_state_7.png" alt="">
    <br><br>
<?php }
if ($position == 8) { ?>
	<img src="./images/gameground/gameground_state_8.png" alt="">
    <br><br>
<?php }
if ($position == 9) { ?>
	<img src="./images/gameground/gameground_state_9.png" alt="">
    <br><br>
<?php }
if ($position == 10) { ?>
	<img src="./images/gameground/gameground_state_10.png" alt="">
    <br><br>
<?php }
if ($position == 11) { ?>
	<img src="./images/gameground/gameground_state_11.png" alt="">
    <br><br>
<?php }
