<?php
echo htmlspecialchars("#include <stdio.h>")."<br>";
echo "int main()"."<br>";
echo "{"."<br>";
foreach ($print as $pr){
    echo $pr->text."<br>";
}
echo "}";
?>

