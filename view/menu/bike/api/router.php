<?php
spl_autoload_register(function ($class) {
  include __DIR__.'/controller/'.$class.'.php';
});
class router{
    private $url = [];
  public function addroute($path, $controller, $set) {
    $this->url[$path]=['controller' => $controller,'set' => $set];
    return $this->url;
  }  

  public function running($url){
    if(array_key_exists($url, $this->url)){
        $data = $this->url[$url];
        $keys = $data['controller'];
        $values = $data['set'];
        
        if (class_exists($keys)) {
          $request = new $keys();
          if (method_exists($request, $values)) {
            $hasil = $request->$values();
            return $hasil;
          }else{
            http_response_code(404);
            include (__DIR__ . '/404.php');
            exit(); 
          }
        }
        else{
          http_response_code(404);
          include (__DIR__ . '/404.php');
          exit(); 
        }
        // $hasil = $request->$values();
        
    }else{
    http_response_code(404);
    include (__DIR__ . '/404.php');
    exit(); 
    }
  }
}