<? 
require_once("connect.php");
$name_genre = $_POST['genre'];

$connect -> query("INSERT INTO `genre`(`name_genre`) VALUES ('$name_genre')");