<?php

namespace App;


class Messages
{
	protected $storage;
	protected $key = 'lumen-flash';
	protected $message = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
		// Start session
        if (session_status() == PHP_SESSION_NONE)
            session_start();

		$this->storage = &$_SESSION;

		// Load messages from previous request
        if (isset($this->storage[$this->key]) && is_array($this->storage[$this->key])) {
            $this->message = $this->storage[$this->key];
        }
		// Empty messages
        $this->storage[$this->key] = [];
    }

	/**
     * Add flash message for current request
     *
     * @param string $key The key to store the message under
     * @param mixed  $message Message to show on next request
     */
    public function add($key, $message)
    {
		// Create Array for this key
        if (!isset($this->storage[$this->key][$key])) {
            $this->storage[$this->key][$key] = [];
        }
        // Push onto the array
		$this->storage[$this->key][$key] = $message;
        $this->message[$key] = $message;
    }

	/**
     * Get all flash messages
     *
     * @return array Messages to show for current request
     */
    public function getAll()
    {
        return $this->message;
    }

    /**
     * Get flash message by key
     *
     * @param string $key The key to get the message from
     * @return array Messages to show for current request
     */
    public function get($key)
    {
        // If the key exists then return all messages or null
        return (isset($this->message[$key])) ? $this->message[$key] : null;
    }

    /**
     * Has Flash Message
     *
     * @param string $key The key to get the message from
     * @return bool Whether the message is set or not
     */
    public function has($key)
    {
        $messages = $this->getAll();
        return isset($messages[$key]);
    }
}
