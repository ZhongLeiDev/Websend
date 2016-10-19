<?php
if(isset($_POST["flag"])){
//远程连接的IP地址
//$remoteip = $_SERVER["REMOTE_ADDR"];
//服务器IP地址
//$serverip = $_SERVER["SERVER_ADDR"];
// 指明给谁推送，为空表示向所有在线用户推送
$to_uid = "";
//$to_uid = $_POST["flag"];
// 推送的信息
$message = "";
//$message = $_POST["text"];
// 推送的url地址，上线时改成自己的服务器地址
$push_api_url = "http://localhost:2121/";
//推送的信息
//echo $to_uid,$message;
if($_POST["flag"] == "all"){
	$currentID = $_POST["currentID"];
	$message = "新的策略已更新！#".$currentID;
}else if($_POST["flag"] == "100"){
    $message = $_POST["text"];
	}else if($_POST["flag"] == "0"){
		$to_uid = "192168001100";
   		$message = $_POST["text"];
		}else if($_POST["flag"] == "1"){
			$to_uid = "192168001101";
   			$message = $_POST["text"];
			}else if($_POST["flag"] == "2"){
				$to_uid = "192168001102";
   				$message = $_POST["text"];
				}else if($_POST["flag"] == "3"){
					$to_uid = "192168001103";
   					$message = $_POST["text"];
					}
else if($_POST["flag"] == "4"){
		$to_uid = "192168001104";
   		$message = $_POST["text"];
		}else if($_POST["flag"] == "5"){
			$to_uid = "192168001105";
   			$message = $_POST["text"];
			}else if($_POST["flag"] == "6"){
				$to_uid = "192168001106";
   				$message = $_POST["text"];
				}else if($_POST["flag"] == "7"){
					$to_uid = "192168001107";
   					$message = $_POST["text"];
					}
else if($_POST["flag"] == "8"){
		$to_uid = "192168001108";
   		$message = $_POST["text"];
		}else if($_POST["flag"] == "9"){
			$to_uid = "192168001109";
   			$message = $_POST["text"];
			}else if($_POST["flag"] == "10"){
				$to_uid = "192168001110";
   				$message = $_POST["text"];
				}else if($_POST["flag"] == "11"){
					$to_uid = "192168001111";
   					$message = $_POST["text"];
					}
$post_data = array(
   "type" => "publish",
   "content" => $message,
   "to" => $to_uid, 
);
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
$return = curl_exec ( $ch );
curl_close ( $ch );
var_export($return);
//echo "数据分发成功！";
}
?>