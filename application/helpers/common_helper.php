<?php
function getfunction($apiname)
{
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'commonapi/CommonApiController/'.$apiname,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));

$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}
function getfunctionparame($apiname,$page)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'commonapi/CommonApiController/'.$apiname.'/'.$page,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}


function getbuyerparame($apiname)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$apiname,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}


function getsallerparame($apiname)
{
  $curl = curl_init();
  $urls=main_url.'sallerapi/SallerApiController/'.$apiname;
  curl_setopt_array($curl, array(
  CURLOPT_URL => $urls,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}

function getoneparame($apiname,$params,$page)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$apiname.'/'.$params.'/'.$page,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}



function statelist()
{
  $sate=array('AP' => 'Andhra Pradesh',
'AR' => 'Arunachal Pradesh',
'AS' => 'Assam',
'BR' => 'Bihar',
'CT' => 'Chhattisgarh',
'GA' => 'Goa',
'GJ' => 'Gujarat',
'HR' => 'Haryana',
'HP' => 'Himachal Pradesh',
'JK' => 'Jammu and Kashmir',
'JH' => 'Jharkhand',
'KA' => 'Karnataka',
'KL' => 'Kerala',
'MP' => 'Madhya Pradesh',
'MH' => 'Maharashtra',
'MN' => 'Manipur',
'ML' => 'Meghalaya',
'MZ' => 'Mizoram',
'NL' => 'Nagaland',
'OR' => 'Odisha',
'PB' => 'Punjab',
'RJ' => 'Rajasthan',
'SK' => 'Sikkim',
'TN' => 'Tamil Nadu',
'TG' => 'Telangana',
'TR' => 'Tripura',
'UT' => 'Uttarakhand',
'UP' => 'Uttar Pradesh',
'WB' => 'West Bengal',
'AN' => 'Andaman and Nicobar Islands',
'CH' => 'Chandigarh',
'DN' => 'Dadra and Nagar Haveli',
'DD' => 'Daman and Diu',
'DL' => 'Delhi',
'LD' => 'Lakshadweep',
'PY' => 'Puducherry',
);
return $sate;
}
function updatepost($urls,$post)
{
   $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$urls,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post,
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753',
      'Content-Type:multipart/form-data'
    ),
   ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}

function updatesellerpost($urls,$post)
{
   $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'sallerapi/SallerApiController/'.$urls,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post,
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753'
    ),
   ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}





function getbuyeroneparame($apiname,$params)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$apiname.'/'.$params,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753',
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return json_decode($response);
}


function getbuyertreeparame($apiname,$params,$params2,$params3)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$apiname.'/'.$params.'/'.$params2.'/'.$params3,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753',
    ),
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  return json_decode($response);
}

function fileuploads($params,$image_name,$post)
{
  $name=$_FILES[$image_name]['name'];
  $tmp_name=$_FILES[$image_name]['tmp_name'];
  $type=$_FILES[$image_name]['type'];
  $ch=curl_init();
  if(empty($name))
  {
    $data[$image_name]=null;
  }
  else
  {
    $data[$image_name]=curl_file_create($tmp_name,$type,$name);
  }
  
  $data['title']=$post['title'];
  $data['order_id']=$post['order_id'];
  curl_setopt($ch,CURLOPT_URL,main_url.'buyerapi/BuyerApiController/'.$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY: b2ballmetallika@753','Content-Type:multipart/form-data'));
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  
  $result=curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}

function fileuploadsutr($params,$image_name,$post)
{
  $name=$_FILES[$image_name]['name'];
  $tmp_name=$_FILES[$image_name]['tmp_name'];
  $type=$_FILES[$image_name]['type'];
  $ch=curl_init();
  
  if(empty($name))
  {
    $data[$image_name]=null;
  }
  else
  {
    $data[$image_name]=curl_file_create($tmp_name,$type,$name);
  }
  $data['title']=$post['title'];
  $data['order_id']=$post['order_id'];
  $data['utr']=$post['utr'];
  curl_setopt($ch,CURLOPT_URL,main_url.'buyerapi/BuyerApiController/'.$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY: b2ballmetallika@753','Content-Type:multipart/form-data'));
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  
  $result=curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}



// delete data
function deletedparame($apiname,$params)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$apiname.'/'.$params,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}

function getsallerparame2($apiname,$params)
{
  $curl = curl_init();
  $urls=main_url.'sallerapi/SallerApiController/'.$apiname.'/'.$params;
  curl_setopt_array($curl, array(
  CURLOPT_URL => $urls,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}

function updatepostseller($urls,$post)
{
   $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'sallerapi/SallerApiController/'.$urls,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post,
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753',
      'Content-Type:multipart/form-data'
    ),
   ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}

function getsallerparame3($apiname,$params,$params2)
{
  $curl = curl_init();
  $urls=main_url.'sallerapi/SallerApiController/'.$apiname.'/'.$params.'/'.$params2;
  curl_setopt_array($curl, array(
  CURLOPT_URL => $urls,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}


function deletedsellerparame($apiname,$params)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'sallerapi/SallerApiController/'.$apiname.'/'.$params,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}


function deletedsellerparame2($apiname,$params,$params2)
{
  //echo main_url.'sallerapi/SallerApiController/'.$apiname.'/'.$params.'/'.$params2;die;
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => main_url.'sallerapi/SallerApiController/'.$apiname.'/'.$params.'/'.$params2,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=>false,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'X-API-KEY: b2ballmetallika@753',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
return json_decode($response);
}


function fileuploadsseller($params,$image_name,$post)
{
  $name=$_FILES[$image_name]['name'];
  $tmp_name=$_FILES[$image_name]['tmp_name'];
  $type=$_FILES[$image_name]['type'];
  $ch=curl_init();
  if(empty($name))
  {
    $data[$image_name]=null;
  }
  else
  {
    $data[$image_name]=curl_file_create($tmp_name,$type,$name);
  }
  
  $data['title']=$post['title'];
  $data['order_id']=$post['order_id'];
  curl_setopt($ch,CURLOPT_URL,main_url.'sallerapi/SallerApiController/'.$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY: b2ballmetallika@753','Content-Type:multipart/form-data'));
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  
  $result=curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}


function fileuploadchallansseller($params,$challan,$laurry,$photos,$post)
{
  $challanname=$_FILES[$challan]['name'];
  $tmp_name=$_FILES[$challan]['tmp_name'];
  $challantype=$_FILES[$challan]['type'];
  $ch=curl_init();
  if(empty($challanname))
  {
    $data[$challan]=null;
  }
  else
  {
    $data[$challan]=curl_file_create($tmp_name,$challantype,$challanname);
  }

  $laurryname=$_FILES[$laurry]['name'];
  $tmp_name1=$_FILES[$laurry]['tmp_name'];
  $laurrytype=$_FILES[$laurry]['type'];
  // $ch=curl_init();
  if(empty($laurryname))
  {
    $data[$laurry]=null;
  }
  else
  {
    $data[$laurry]=curl_file_create($tmp_name1,$laurrytype,$laurryname);
  }


  $photosname=$_FILES[$photos]['name'];
  $tmp_name2=$_FILES[$photos]['tmp_name'];
  $photostype=$_FILES[$photos]['type'];

  if(empty($photosname))
  {
    $data[$photos]=null;
  }
  else
  {
    $data[$photos]=curl_file_create($tmp_name2,$photostype,$photosname);
  }

  
  $data['mtc']=$post['mtc'];
  $data['packing_list']=$post['packing_list'];
  $data['order_id']=$post['order_id'];
  curl_setopt($ch,CURLOPT_URL,main_url.'sallerapi/SallerApiController/'.$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY: b2ballmetallika@753','Content-Type:multipart/form-data'));
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  
  $result=curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}

function updatecommonpost($urls,$post)
{
   $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'commonapi/CommonApiController/'.$urls,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYHOST=> false,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post,
    CURLOPT_HTTPHEADER => array(
      'X-API-KEY: b2ballmetallika@753',
      'Content-Type:multipart/form-data'
    ),
   ));

    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}

// add post requirement
function add_post_requiremnt($params,$image_name,$post)
{
  $name=$_FILES[$image_name]['name'];
  $tmp_name=$_FILES[$image_name]['tmp_name'];
  $type=$_FILES[$image_name]['type'];
  $ch=curl_init();
  if(empty($name))
  {
    $post[$image_name]=null;
  }
  else
  {
    $post[$image_name]=curl_file_create($tmp_name,$type,$name);
  }
  curl_setopt($ch,CURLOPT_URL,main_url.'buyerapi/BuyerApiController/'.$params);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-API-KEY: b2ballmetallika@753','Content-Type:multipart/form-data'));
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
  
  $result=curl_exec($ch);
  curl_close($ch);
  return json_decode($result);
}
?>
