<?php
error_reporting(E_ALL);
ini_set('display', 1);

class JsonDB {

	protected $filename;
	protected $json;
	
	function __construct($filename)
	{
		$this->filename = $filename;	
		$this->json = json_decode(file_get_contents($filename), true);	
	}

	function add($key, $value)
	{
		$this->json[$key] = $value;
	}

	function get($key)
	{
		return $this->json[$key];
	}

	function save()
	{
		return file_put_contents($this->filename, json_encode($this->json));
	}
}

$db = new JsonDB('db.txt');
//$db->add('3', ['name' => 'Allan Ferreira', 'email' => 'allan.less@outlook.com', 'senha' => 'UGgjhg¨hJKLGguopuyY']);
//$db->save();
//http://gustavopaes.net/blog/2010/php-como-ler-e-escrever-dados-no-formato-json.html
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php echo $db->get(1);?>
</body>
</html>