<?php 
include 'includes/header.php';
include 'function.php';

$files = glob('backup/*');
$file = array_map('basename', $files);

echo "<ul class=\"files-css\">";
foreach ($file as $value) {
    $selected = (isset($_GET['part']) && $_GET['part'] == $value) ? 'selected' : '';
    echo "<li class=\"$selected\"><a href=\"?part=$value\">$value</a></li>";
}
echo "</ul>";

if(isset($_GET['part'])) {
    $x = $_GET['part'];

    $backup_files = glob("backup/$x/*");
    echo "<ul class=\"file-content\">";
    foreach ($backup_files as $value) {
        if (is_file($value)) {
            $ext = pathinfo($value, PATHINFO_EXTENSION);
            if ($ext == 'txt' || $ext == 'log' || $ext == 'php' || $ext == 'html') { // pridajte ďalšie rozšírenia, ak ich chcete zahrnúť
                $content = file_get_contents($value);
                echo "<li><strong>$value</strong><br><pre>$content</pre></li>";
            }
        }
    }
    echo "</ul>";
    echo "<p>Počet súborov v zálohe: " . pocet_suborov("backup/$x") . "</p>";
}
?>
