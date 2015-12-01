<?php

namespace Ivan988;

class ArrayWrap
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * Returns array element by key (null if there is no element with that key)
     *
     * @param mixed $key
     * @return null|mixed
     */
    public function get($key)
    {
        if (!isset($this->array[$key])) {
            return null;
        }

        return $this->array[$key];
    }

    /**
     * Returns array element by key, but throws exception if key is missing
     *
     * @param mixed $key
     * @return mixed|null
     * @throws \Exception
     */
    public function getOrFail($key)
    {
        $element = $this->get($key);

        if (is_null($element)) {
            throw new \Exception(sprintf('Key "%s" is not set', $key));
        }

        return $element;
    }

    /**
     * Set new value for array element on specific index
     *
     * @param mixed $key
     * @param null|mixed $value
     * @return $this
     */
    public function set($key, $value = null)
    {
        $this->array[$key] = $value;

        return $this;
    }

    /**
     * Add new element to the array
     *
     * @param mixed $value
     * @return $this
     */
    public function add($value)
    {
        $this->array[] = $value;

        return $this;
    }

    /**
     * Remove element from the array
     *
     * @param mixed $key
     * @return $this
     */
    public function remove($key)
    {
        unset($this->array[$key]);

        return $this;
    }

    /**
     * Array count
     *
     * @return int
     */
    public function count()
    {
        return count($this->array);
    }

    /**
     * ArrayWrap to array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->array;
    }
}
