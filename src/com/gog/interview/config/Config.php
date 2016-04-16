<?php
namespace gog;

class Config implements \ArrayAccess
{
    protected $vars = array();

    static private $instance = null;

    private function __construct(array $vars = array()) {
        $this->vars = $vars;
    }
    /**
     * @return Config
     */
    static public function getInstance() {
        if (!self::$instance) {
            $config = parse_ini_file("config.ini", true);
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function __set($key, $value) {
        $this->vars[$key] = $value;
    }

    public function __get($key)
    {
        if (isset($this->vars[$key])) {
            if (is_array($this->vars[$key])) {
                return new self($this->vars[$key]);
            }
            return $this->vars[$key];
        }
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->vars[] = $value;
        } else {
            $this->vars[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->vars[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->vars[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->vars[$offset]) ? $this->__get($offset) : null;
    }
}