<?php

namespace BoxedCode\Silex\Configuration;

/**
 * Class Reader
 *
 * @package BoxedCode\Silex\Configuration
 */
class Reader implements ReaderInterface
{
    /**
     * Configuration
     *
     * @var array
     */
    protected $configuration;

    /**
     * Reader constructor.
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Find a configuration value by key
     *
     * @param string $key
     * @return mixed
     */
    public function find($key)
    {
        if (!array_key_exists($key, $this->configuration)) {
            throw new \InvalidArgumentException("Unknown configuration parameter with key: " . $key);
        }

        return $this->configuration[$key];
    }

    /**
     * Determine if a configuration key exists
     *
     * @param string $key
     * @return boolean
     */
    public function has($key)
    {
        if (!array_key_exists($key, $this->configuration)) {
            return false;
        }

        return true;
    }

    /**
     * Set the configuration for this reader
     *
     * @param array $configuration
     * @return mixed
     */
    public function setConfiguration(array $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

}