<?php

#---- getting JSON
$JSON = file_get_contents('http://shopping.mind-techs.com/api/Products/1/1/0/100/atoz');
#--- decoding content
$decodedJSON = json_decode($JSON,true);
#--- displaying content
for ($i=0; $i < count($decodedJSON['data']) ; $i++) { 
    # code...
    echo $decodedJSON["data"][$i]["products_id"].'<br>';
    echo $decodedJSON["data"][$i]["products_slug"].'<br>';
    echo '<br>';
}

?>