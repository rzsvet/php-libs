<?php
//
// Php lib > fix multi-line CSV string
// rzsvet 2020
// 
$countFields = 51; //Указываем количество полей csv
$importFile = fopen("Import.txt", "r") or die("Unable to open file!");
$exportfile = fopen("Export.txt", "w") or die("Unable to open file!");
while(!feof($importFile)) {
    @$one_line .= fgets($importFile);
    $tmp_array = explode('^',$one_line); 
    if (count($tmp_array) == $countFields) {
        $one_line = trim(preg_replace("/(\s*[\r\n]+\s*|\s+)/", ' ', $one_line));
        fwrite($exportfile, $one_line."\n");
        $one_line = '';
    }
}
fclose($exportfile);
fclose($importFile);