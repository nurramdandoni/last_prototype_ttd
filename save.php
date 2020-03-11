<?php 
// echo "pke";
date_default_timezone_set('Asia/Jakarta');		
$result = array();
$ttd = $_POST['img_data'];

            $imagedata = base64_decode($ttd);
            $filename = 'ttd@'.date('d-m-Y').'@'.strtotime(date('d-m-Y'));
            //Location to where you want to created sign image
            $file_name = 'ttd/'.$filename.'.png';
            file_put_contents($file_name,$imagedata);
$result = array(
    'data' => array(
        'loc_ttd' => $file_name
    )
);


echo json_encode($result);

?>