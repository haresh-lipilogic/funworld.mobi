<?php
$obj = array(
            'requestId'=>$clickid,
            'code'=>'SUCCESS',
            'inError'=>'false',
            'message'=>'success',
            'responseData'=>array()
    );
$data = json_encode($obj,JSON_FORCE_OBJECT);
echo $data;
?>