<?php

//upload.php

if(isset($_POST['image']))
{
	$data = $_POST['image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);

	$image_name = 'img/orang/' . time() . '.jpg';

	file_put_contents($image_name, $data);

	echo $image_name;
    return $image_name;
}

?>