<?php
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $data = new AdminController();
    $data->removeProduct();
}else{
    Redirect::to("home");
}
