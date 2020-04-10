<?php
/**
 * NekoCASResponse.php
 *
 * Created in 2020/4/10 6:44 下午
 * Created by johnwu
 */

namespace NekoWheel;

class NekoCASResponse
{
    private $success;
    private $name;
    private $email;
    private $token;
    private $message;

    public function __construct($success = false, $name = '', $email = '', $token = '', $message = '')
    {
        $this->success = $success;
        $this->name = $name;
        $this->email = $email;
        $this->token = $token;
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}