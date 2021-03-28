<?php

namespace Tchury\Responser;

class Responser
{
    public $response, $status = 200;

    public function response()
    {
        if (!isset($this->response['success']) || $this->status > 400) {
            $this->response['success'] = false;
        }

        return response()->json($this->response, $this->status);

    }

    public function success()
    {
        $this->response['success'] = true;
        return $this;
    }

    public function failed()
    {
        $this->response['success'] = false;
        if($this->status == 200) {
            $this->status = 500;
        }
        return $this;
    }

    public function message($message)
    {
        $this->response['message'] = $message;
        return $this;
    }

    public function addItem($item_name, $item)
    {
        $this->response[$item_name] = $item;
        return $this;
    }

    public function statusCode($status) {
        $this->status = $status;
        return $this;
    }
}
