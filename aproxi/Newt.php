<?php

namespace Aproxi\Module;

class Newt extends ModuleBase {
  public function get($endpoint, $params=[]){
    switch($endpoint){
      case "/accela-document/articles":
        $url = "https://{$this->setting['spaceUid']}.cdn.newt.so/v1/accela-document/article";
        $query = [
          "select" => "_id,title,slug,type",
          "order" => "-_sys.customOrder"
        ];
        return $this->http_client->get($url, $query, "json");

      case "/accela-document/article":
        $uid = isset($params["id"]) ? $params["id"] : null;
        if(!$uid) return null;

        $url = "https://{$this->setting['spaceUid']}.cdn.newt.so/v1/accela-document/article/{$uid}";
        return $this->http_client->get($url, ["select" => "contents"], "json");

      default:
        return "null";
    }
  }

  public function post($endpoint, $params=[]){
    return null;
  }

  public function response($res, $method, $endpoint, $params){
    http_response_code($res["status"]);
    header("Content-Type: application/json");
    echo json_encode($res["body"]);
  }
}
