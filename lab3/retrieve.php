<?php

$retrieve1 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'header1'");
if ($retrieve1) {
$retrieve1->bind_result($header1_bgcolor_fetched, $header1_fgcolor_fetched, $header1_text_fetched);
$retrieve1->execute();
$retrieve1->fetch();
$retrieve1->close();
}

$retrieve2 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'mainNav'");
if ($retrieve2) {
$retrieve2->bind_result($mainNav_bgcolor_fetched, $mainNav_fgcolor_fetched, $mainNav_text_fetched);
$retrieve2->execute();
$retrieve2->fetch();
$retrieve2->close();
}

$retrieve3 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'coloumnA'");
if ($retrieve3) {
$retrieve3->bind_result($coloumnA_bgcolor_fetched, $coloumnA_fgcolor_fetched, $coloumnA_text_fetched);
$retrieve3->execute();
$retrieve3->fetch();
$retrieve3->close();
}

$retrieve4 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'siteAds'");
if ($retrieve4) {
$retrieve4->bind_result($siteAds_bgcolor_fetched, $siteAds_fgcolor_fetched, $siteAds_text_fetched);
$retrieve4->execute();
$retrieve4->fetch();
$retrieve4->close();
}

$retrieve5 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'mainArticle'");
if ($retrieve5) {
$retrieve5->bind_result($mainArticle_bgcolor_fetched, $mainArticle_fgcolor_fetched, $mainArticle_text_fetched);
$retrieve5->execute();
$retrieve5->fetch();
$retrieve5->close();
}

$retrieve6 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'coloumnB'");
if ($retrieve6) {
$retrieve6->bind_result($coloumnB_bgcolor_fetched, $coloumnB_fgcolor_fetched, $coloumnB_text_fetched);
$retrieve6->execute();
$retrieve6->fetch();
$retrieve6->close();
}

$retrieve7 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'footer1'");
if ($retrieve7) {
$retrieve7->bind_result($footer1_bgcolor_fetched, $footer1_fgcolor_fetched, $footer1_text_fetched);
$retrieve7->execute();
$retrieve7->fetch();
$retrieve7->close();
}

$retrieve8 = mysqli_prepare($conn, "SELECT bgcolor, fontcolor, text FROM labs3db WHERE field = 'notification'");
if ($retrieve8) {
$retrieve8->bind_result($notification_bgcolor_fetched, $notification_fgcolor_fetched, $notification_text_fetched);
$retrieve8->execute();
$retrieve8->fetch();
$retrieve8->close();
}

$header1_bgcolor = $header1_bgcolor_fetched ? $header1_bgcolor_fetched : "#B0C4DE";
$header1_fgcolor = $header1_fgcolor_fetched ? $header1_fgcolor_fetched : "#000000";
$header1_text = $header1_text_fetched ? $header1_text_fetched : "<p class=\"usualtext\"> Замітки з лаби 1</p>";
$mainNav_bgcolor = $mainNav_bgcolor_fetched ? $mainNav_bgcolor_fetched : "#FFC0CB";
$mainNav_fgcolor = $mainNav_fgcolor_fetched ? $mainNav_fgcolor_fetched : "#000000";
$mainNav_text = $mainNav_text_fetched ? $mainNav_text_fetched : "<h2>Лабораторна робота №3</h2>";
$coloumnA_bgcolor = $coloumnA_bgcolor_fetched ? $coloumnA_bgcolor_fetched : "#ADD8E6";
$coloumnA_fgcolor = $coloumnA_fgcolor_fetched ? $coloumnA_fgcolor_fetched : "#000000";
$coloumnA_text = $coloumnA_text_fetched ? $coloumnA_text_fetched : "<h2>Конфігурація успішно підтягується...<br />А чи підтягуєшся ти?</h2>";
$siteAds_bgcolor = $siteAds_bgcolor_fetched ? $siteAds_bgcolor_fetched : "#FFC0CB";
$siteAds_fgcolor = $siteAds_fgcolor_fetched ? $siteAds_fgcolor_fetched : "#000000";
$siteAds_text = $siteAds_text_fetched ? $siteAds_text_fetched : "<h2>Дар'я Ропаєва</h2>";
$mainArticle_bgcolor = $mainArticle_bgcolor_fetched ? $mainArticle_bgcolor_fetched : "#FFFFFF";
$mainArticle_fgcolor = $mainArticle_fgcolor_fetched ? $mainArticle_fgcolor_fetched : "#000000";
$mainArticle_text = $mainArticle_text_fetched ? $mainArticle_text_fetched : "Article";
$coloumnB_bgcolor = $coloumnB_bgcolor_fetched ? $coloumnB_bgcolor_fetched : "#ADD8E6";
$coloumnB_fgcolor = $coloumnB_fgcolor_fetched ? $coloumnB_fgcolor_fetched : "#000000";
$coloumnB_text = $coloumnB_text_fetched ? $coloumnB_text_fetched : "<h2>Якщо в тебе є array(), в ньому може бути вкладений array()...</h2>";
$footer1_bgcolor = $footer1_bgcolor_fetched ? $footer1_bgcolor_fetched : "none";
$footer1_fgcolor = $footer1_fgcolor_fetched ? $footer1_fgcolor_fetched : "#000000";
$footer1_text = $footer1_text_fetched ? $footer1_text_fetched : "<p class=\"usualtext\"> footer </p>";
$notification_bgcolor = $notification_bgcolor_fetched ? $notification_bgcolor_fetched : "darkcyan";
$notification_fgcolor = $notification_fgcolor_fetched ? $notification_fgcolor_fetched : "lightcyan";
$notification_text = $notification_text_fetched ? $notification_text_fetched : "Натисніть ОК, щоб зачинити віконце, через яке можуть пролізти монстри.";

$testing = false;

if ($testing) {
    echo "I retrieved this from server: " . $header1_bgcolor_fetched . " | " . $header1_fgcolor_fetched . " | " . $header1_text_fetched . "<br>";
    echo "I retrieved this from server: " . $mainNav_bgcolor_fetched . " | " . $mainNav_fgcolor_fetched . " | " . $mainNav_text_fetched . "<br>";
    echo "I retrieved this from server: " . $coloumnA_bgcolor_fetched . " | " . $coloumnA_fgcolor_fetched . " | " . $coloumnA_text_fetched . "<br>";
    echo "I retrieved this from server: " . $siteAds_bgcolor_fetched . " | " . $siteAds_fgcolor_fetched . " | " . $siteAds_text_fetched . "<br>";
    echo "I retrieved this from server: " . $mainArticle_bgcolor_fetched . " | " . $mainArticle_fgcolor_fetched . " | " . $mainArticle_text_fetched . "<br>";
    echo "I retrieved this from server: " . $coloumnB_bgcolor_fetched . " | " . $coloumnB_fgcolor_fetched . " | " . $coloumnB_text_fetched . "<br>";
    echo "I retrieved this from server: " . $footer1_bgcolor_fetched . " | " . $footer1_fgcolor_fetched . " | " . $footer1_text_fetched . "<br>";
    echo "This is what's gonna be in the end:" . $header1_bgcolor . " | " . $header1_fgcolor . " | " . $header1_text . "<br>";
    echo "This is what's gonna be in the end:" . $mainNav_bgcolor . " | " . $mainNav_fgcolor . " | " . $mainNav_text . "<br>";
    echo "This is what's gonna be in the end:" . $coloumnA_bgcolor . " | " . $coloumnA_fgcolor . " | " . $coloumnA_text . "<br>";
    echo "This is what's gonna be in the end:" . $siteAds_bgcolor . " | " . $siteAds_fgcolor . " | " . $siteAds_text . "<br>";
    echo "This is what's gonna be in the end:" . $mainArticle_bgcolor . " | " . $mainArticle_fgcolor . " | " . $mainArticle_text . "<br>";
    echo "This is what's gonna be in the end:" . $coloumnB_bgcolor . " | " . $coloumnB_fgcolor . " | " . $coloumnB_text . "<br>";
    echo "This is what's gonna be in the end:" . $footer1_bgcolor . " | " . $footer1_fgcolor . " | " . $footer1_text . "<br>";
}

?>