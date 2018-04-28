<?php
$historiques = Session::get('histo');
?>

<div class="col-md-2 col-lg-2 hidden-xs hidden-sm leftBar">
    <div class="user_box_title ">
        <center>@if(Session::get('user')){{Session::get('user')->nom}}@endif</center>
    </div>
    <div class="user_box">
        <br><br><br><br><br><br><br>
    </div>
    <div class="user_box">
        <span class="semi-bold">Nom :</span> @if(Session::get('user')){{Session::get('user')->nom}} @endif<br>
        <span class="semi-bold">Profession :</span> @if(Session::get('user')){{Session::get('user')->type}} @endif<br>
        <span class="semi-bold">Département :</span> @if(Session::get('user')){{Session::get('user')->departement}}@endif<br>
        <span class="semi-bold">Composante :</span>@if(Session::get('user')) {{Session::get('user')->composante}}@endif<br>
        <span class="semi-bold">HTD attribuées :</span>@if(Session::get('user')) {{Session::get('user')->HTDattrib}}@endif<br>
    </div>

</div>