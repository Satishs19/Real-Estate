<html>
<head>
<link rel="stylesheet" type="text/css" href="css.php"/>
<head>
<?php
class DBImg {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // (C) SAVE IMAGE (FROM UPLOAD)
  function save () {
    try {
      $this->stmt = $this->pdo->prepare(
        "INSERT INTO `images` (`img_name`, `img_data`) VALUES (?,?)"
      );
      $this->stmt->execute([
        $_FILES["upload"]["name"], file_get_contents($_FILES['upload']['tmp_name'])
      ]);
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
    return true;
  }

  // (D) GET IMAGE
  function get ($name) {
    $this->stmt = $this->pdo->prepare(
      "SELECT `img_data` FROM `images` WHERE `img_name`=?"
    );
    $this->stmt->execute([$name]);
    $img = $this->stmt->fetch();
    return $img['img_data'];
  }

  // (E) GENERATE BASE64 ENCODED IMG TAG
  function show ($name) {
    $img = base64_encode($this->get($name));
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    echo "<img src='data:image/jpg;base64,".$img."' />";
  }
}

// (F) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define('DB_HOST', 'localhost');
define('DB_NAME', 'realestate');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// (G) NEW DATABASE IMAGE OBJECT
$DBIMG = new DBImg();
