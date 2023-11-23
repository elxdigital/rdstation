<?php

namespace Source\Support\RDStation;

class RDStation
{

    private $url;
    private $secret;
    private $params;
    private $endPoint;
    private $callback;

    public function __construct()
    {
        $this->url = 'api.rd.services';
    }

    /**
     * Set the value of params
     *
     * @return  self
     */
    protected function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Set the value of endPoint
     *
     * @return  self
     */
    protected function setEndPoint(string $endPoint)
    {
        $this->endPoint = (string) $endPoint;

        return $this;
    }

    /**
     * Get the value of callback
     */
    protected function getCallback()
    {
        return $this->callback;
    }

    /**
     * ########################
     * ### METODO PROTEGIDO ###
     * ########################
     */

    //Faz uma requisição do tipo POST
    protected function post()
    {
        $url = 'https://' . $this->url . $this->endPoint;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer',
            'Content-Type: application/json'
        ]);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $this->callback = curl_error($ch);
        } else {
            $this->callback = json_decode($result, true);
        }

        curl_close($ch);
        return;
    }

    //Faz uma requisição do tipo PATCH
    protected function patch()
    {
        $url = 'https://' . $this->url . $this->endPoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',             
            'Authorization: Basic ' . base64_encode("{$this->secret}:")
        ]);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $this->callback = curl_error($ch);
        } else {
            $this->callback = json_decode($result, true);
        }

        curl_close($ch);
        return;
    }

    //Faz uma requisição do tipo PATCH
    protected function delete()
    {
        $url = 'https://' . $this->url . $this->endPoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("{$this->secret}:")
        ]);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            $this->callback = curl_error($ch);
        } else {
            $this->callback = json_decode($result, true);
        }

        curl_close($ch);
        return;
    }

    //Faz uma requisição do tipo GET
    protected function get()
    {

        $url = 'https://' . $this->url . $this->endPoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("{$this->secret}:")
        ]);        
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $this->callback = curl_error($ch);
        } else {
            $this->callback = json_decode($result, true);
        }
        curl_close($ch);
        return;
    }
}
