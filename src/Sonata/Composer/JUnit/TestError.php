<?php

/*
* This file is part of the Sonata project.
*
* (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Sonata\Composer\JUnit;

use Sonata\Composer\Utils;

class TestError
{
    protected $type;

    protected $message;

    /**
     * @param string $type
     * @param string $message
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * @param string $type
     * @param string $message
     *
     * @return TestError
     */
    static function create($type, $message)
    {
        return new self($type, $message);
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toXml();
    }

    /**
     * @return string
     */
    public function toXml()
    {
        return sprintf('<error type="%s">%s</error>',
            Utils::encodeXml($this->getType()),
            Utils::cdata($this->getMessage())
        );
    }
}