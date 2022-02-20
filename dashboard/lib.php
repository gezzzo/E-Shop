<?php

function AddCategory($name,$description,$thumbnail){
    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "INSERT INTO `categories`(`name`, `description`, `thumbnail`) VALUES ('$name','$description','$thumbnail')";

    mysqli_query($co,$qu);
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function AddProduct($sku,$name,$description,$price,$image,$thumbnail,$stock,$category_id,$admin){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "INSERT INTO `products`( `sku`, `name`, `price`, `descriptions`, `image`, `thumbnail`, `stock`, `category_id`,`admin_id`) 
    VALUES ('$sku','$name','$price','$description','$image','$thumbnail','$stock','$category_id','$admin')";

    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}


function AddAdmin($name,$username,$password,$is_superadmin){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "INSERT INTO `admin`(`name`, `username`, `password`, `is_superuser`) VALUES ('$name','$username','$password','$is_superadmin')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function AddCustomer($name,$email,$password,$country,$phone,$address){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "INSERT INTO `customers`(`name`, `email`,`password`, `country`, `phone`, `address`) VALUES ('$name','$email','$password','$country','$phone','$address')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}


function ShowCategories(){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `categories`";

    $q = mysqli_query($co,$qu);

    $categories=[];

    while($res = mysqli_fetch_assoc($q)){
        $categories[]=$res;
    }

    return $categories;

}

function ShowAdmins(){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `admin`";

    $q = mysqli_query($co,$qu);

    $Admins=[];

    while($res = mysqli_fetch_assoc($q)){
        $Admins[]=$res;
    }

    return $Admins;

}


function ShowProducts(){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "CALL `ShowProducts`();";

    $q = mysqli_query($co,$qu);

    $products=[];

    while($res = mysqli_fetch_assoc($q)){
        $products[]=$res;
    }

    return $products;

}

function showproductss($id){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `products` WHERE `category_id`='$id'";

    $q = mysqli_query($co,$qu);

    $products=[];

    while($res = mysqli_fetch_assoc($q)){
        $products[]=$res;
    }

    return $products;

}

function shownewproducts(){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `products` ORDER BY `id` DESC ";

    $q = mysqli_query($co,$qu);

    $products=[];

    while($res = mysqli_fetch_assoc($q)){
        $products[]=$res;
    }

    return $products;

}




function ShowCategoryById($id){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `categories` WHERE `id`='$id' ";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}

function ShowProductById($id){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `products` WHERE `id`='$id' ";

    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);
    
    return $res;

}



function UpdateCategory($id,$name,$description,$thumbnail){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "UPDATE `categories` SET `name`='$name',`description`='$description',`thumbnail`='$thumbnail' WHERE id='$id'";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function UpdateProduct($id,$sku,$name,$description,$price,$image,$thumbnail,$stock,$category_id){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "UPDATE `products` SET `sku`='$sku',`name`='$name',`price`='$price',`descriptions`='$description',`image`='$image',`thumbnail`='$thumbnail',`stock`='$stock',`category_id`='$category_id' WHERE id='$id'";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}



function UpdateAdmin($id,$admin){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "UPDATE `admin` SET `is_superuser`='$admin' WHERE id='$id'";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function ChangePassword($id,$password){

    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "UPDATE `admin` SET `password`='$password' WHERE id='$id'";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function DeleteCategory($id){
    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "DELETE FROM `categories` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}



function DeleteProduct($id){
    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "DELETE FROM `products` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

function loginadmin($username,$password){
    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = " SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}


function logincustomer($email,$password){
    $co = mysqli_connect("localhost","root","","ecommerce1");

    $qu = "SELECT * FROM `customers` WHERE `email` = '$email' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;

}