<?php

use yii\helpers\Url;

?>

<head>
    <link rel="stylesheet" href="../web/search/custom_search_bar.css" type="text/css">
</head>
<!-- search bar start -->
<div class="search-bar">
    <!-- dropdown start -->
    <div class="dropdown">
        <div id="drop-text" class="dropdown-text">
            <span id="span" class="every">Everything</span>
            <!-- <i class="fa-solid fa-chevron-down"></i> -->
            <i id="icon" class="arrow-down"></i>
        </div>

        <div id="cover" style="position: absolute; top:0; left:0;width:100%; height:100%; z-index:9"></div>
        <ul id="list" class="dropdown-list" style="z-index:100;">
            <li class="dropdown-list-item">Everything</li>
            <li class="dropdown-list-item">Videos</li>
            <li class="dropdown-list-item">Community</li>
            <li class="dropdown-list-item">Playlists</li>
            <li class="dropdown-list-item">Shorts</li>
        </ul>


    </div>




    <!-- dropdown end -->

    <!-- search box input start -->
    <div class="search-box"></div>
    <input type="text" id="search-input" class="search-input" placeholder=".....Search anything..." style="width: 400px;
    height: 27px;
    padding: 8px;
    border: 1px solid pink;
    border-radius: -4px;
    outline: none;
    margin-left: -75%;
    margin-right: 20%;
    margin-top: 6px;
    color: #a91630;">
    <i class="fa-solid fa-magnifying-glass"></i>
    <button type="submit"><i class="fa fa-search"></i></button>
    <!-- search box input end -->
</div>
<!-- search bar end -->

<script>
    let dropdownBtn = document.getElementById("drop-text");
    let list = document.getElementById("list");
    let icon = document.getElementById("icon");
    let span = document.getElementById("span");

    dropdownBtn.onclick = function () {
        if (list.classList.contains("show")) {
            icon.style.rotate = "0deg";
        } else {
            icon.style.rotate = "-180deg";
        }
        list.classList.toggle("show");

    };

    window.onclick = function (e) {
        if (
            e.target.id !== "drop-text" &&
            e.target.id !== "span" &&
            e.target.id !== "icon"
        ) {
            list.classList.remove("show");
            icon.style.rotate = "0deg";
        }
    }

    $('.dropdown-item').click(function () {
        var category = $(this).text();
        $('#span').text(category);
    });


</script>



<style>
    span.every {
        width: 114px;
    height: 29px;
    margin-left: 176px;
    margin-top: -2px;
    }

    .every {
        position: relative;
        width: 111px;
        border-radius: 50px;
        border: 1px solid white;
        background-color: #ff0060;
        box-shadow: gray;
        cursor: pointer;
        text-align: center;
        margin-left: 144px;
        position: absolute;
        top: 6px;
        height: 27px;
        width: 113px;
    }

    .dropdown-list{
        position: relative;
    }

    .dropdown-text {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 1rem;
        font-weight: 500;
        color: white;
        padding: 1rem 1.5rem;
    }

    .arrow-down {
        position: absolute;
        top: 17px;
        left: 297px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid white;
    }

    .search-bar {
        display: flex;
        align-items: center;
        min-width: 90%;
        border-radius: 50px;
        margin-left: 10%;
    }

    .search-box {
        display: flex;
        align-items: center;
        padding-right: 1rem;
        width: 100%;
        color: plum;
        border: 0;
        outline: 0;
    }


    input {
        padding: 1rem;
        width: 100%;
        font-size: 1rem;
        font-weight: 500;
        color: purple;
        border: 0;
        outline: 0;
        margin-left: 50px;
        color: #a91630;
    }

    .input::placeholder {
        font-size: 1rem;
        font-weight: 500;
        color: purple;
        border-radius: 20px;
        margin-left: 200%;
    }

    form {
        position: relative;
    }

    .input[type="text"] {
        width: 400px;
    height: 27px;
    padding: 8px;
    border: 1px solid pink;
    border-radius: -4px;
    outline: none;
    margin-left: -773px;
    margin-right: 200px;
    margin-top: 6px;
    color: #a91630;
    }

    button[type="submit"] {
        padding: 8px 12px;
    background-color: #007bff;
    border: none;
    border-radius: 20px;
    color: white;
    cursor: pointer;
    margin-left: -227px;
    }

    .dropdown-list {
        position: absolute;
        top: 2rem;
        left: 195px;
        width: 120px;
        border-radius: 15px;
        max-height: 0;
        overflow: hidden;
        background-color: lightseagreen;
        transition: max-height 0.5s;
        z-index: 1000;
    }

    #navbarSupportedContent {
        width: 100%;
        background-color: rgb(249, 236, 230);
        -webkit-box-pack: center;
        justify-content: center;
        padding: 10px 0px;
        border-radius: 15px 15px 0px 0px;
        z-index: 999;
    }

    #list.show {
        max-height: 300px;
    }

    .dropdown-list-item {
        font-size: 0.9rem;
        font-weight: 500;
        padding: 1rem 0 1rem 1.5rem;
        cursor: pointer;
        margin-left: -147%;
        transition: margin-left 0.2s ease, color 0.2s ease;
    }

    .dropdown-list-item:hover {
        color: #f2f2f2;
        transform: translateX(10px);
    }

    .dropdown-list.show {
        display: block;
    }


    .search-input {
        margin-right;
        : 100px
    }
</style>