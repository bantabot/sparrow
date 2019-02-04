
<?php



    //would be able to handle a curl object or a mock object
    class AliRequester
    {
        private $curl = null;
        private $response = null;
        private $err = null;
        private $optionArray = null;
        private $curlSetOp = null;

        function my_curl_init()
        {
            $this->curl = curl_init();
            return $this->curl;

        }

        function setop_array_builder($url, $action, $description, $auth)
        {

            $this->optionArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $action,
                CURLOPT_POSTFIELDS => $description,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Basic " . $auth . "",
                    "Cache-Control: no-cache",
                    "Content-Type: application/json",

                ));
            return $this->optionArray;


        }

        function my_curl_setop_array()
        {

               $this->curlSetOp = curl_setopt_array($this->curl, $this->optionArray);
               return $this->curlSetOp;
        }

        function my_curl_exec()
        {
            $this->response = curl_exec($this->curl);
            return $this->response;
        }

        function my_curl_error()
        {
            $this->err = curl_error($this->curl);
            return $this->err;
        }

        function my_curl_close()
        {
            curl_close($this->curl);
        }

        function my_curl_get_response()
        {
            if ($this->err){
                return $this->err;
            }
            else {
                return $this->response;
            }
        }

        function get_response()
        {
           return $this->response;

        }
        function get_error()
        {
            return $this->err;
        }



    }

    ?>