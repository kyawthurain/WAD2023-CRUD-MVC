<?php

function index()
{   
    $sql = "SELECT * FROM students";
    if(!empty($_GET["q"])){
        $q = $_GET["q"];
        $sql .= " WHERE name LIKE '%$q%'";
    }
    return view("list/index",["lists" => all($sql)]);
}

function create(){
    
    return view("list/create");
}

function store(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $name = $_POST["name"];
        $money = $_POST["money"];
        $sql = "INSERT INTO students (name,money) VALUES ('$name',$money)";
        run($sql);
        return redirect("list");
    }
}

function delete(){
    $id = $_POST["id"];
    $sql = "DELETE FROM students WHERE id=$id";
    run($sql);
    return redirect("list");
}

function edit(){
    $id = $_GET["id"];
    $sql = "SELECT * FROM students WHERE id=$id";
    return view("list/edit",["lists" => first($sql)]);
}

function update(){
    
    $id = $_POST["id"];
    $name = $_POST["name"];
    $money = $_POST["money"];
    $sql = "UPDATE students SET name='$name',money=$money WHERE id=$id";
    run($sql);
    return redirect("list");
}