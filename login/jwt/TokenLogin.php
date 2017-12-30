<?php

require_once('vendor/autoload.php');
use \Firebase\JWT\JWT;

class TokenLogin {
   private $secret;

   function __construct($secret) {
      $this->secret = $secret;
   }

   function create_token($uid, $token_duration = 24 /* Hours */) {
      $uid = intval($uid);
      if (!($uid > 0)) return;

      $now = time();

      $data = array();
      $data['uid'] = $uid;
      $data['iat'] = $now;
      $data['exp'] = $now + $token_duration * (60 * 60);

      return JWT::encode($data, $this->secret);
   }

   function validate_token($token) {
      try {
         $payload = JWT::decode($token, $this->secret, array('HS256'));
         if (!$payload) return FALSE;
         return json_decode(json_encode($payload));
      } catch (Exception $e) {
         die(var_dump($e));
         return FALSE;
      }
   }
   function valid_session($mysqli, $rol, $token){
      $payload = $this->validate_token($token);

      if ($payload) {
            if($result = $mysqli->query("select * from login where idLogin = '{$payload->uid}'")){
             while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                 $myArray[] = $row;
             }
            if (empty($myArray)){
               http_response_code(405);
                 echo "id no existe";
                 return;
            }else{
               if ($myArray[0]['rol']!=$rol){
                  http_response_code(405);
                    echo "Usuario no tiene permisos";
                    return;
               }
            }
         }
      }else{
         http_response_code(405);
         echo "Login Expirado";
         return;
      }
      return $payload->uid;
   }
}

?>
