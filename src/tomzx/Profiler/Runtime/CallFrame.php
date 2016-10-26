<?php

namespace tomzx\Profiler\Runtime;

class CallFrame
{
    /**
     * @var string
     */
    public $functionName;
    /**
     * @var string
     */
    public $scriptId;
    /**
     * @var string
     */
    public $url;
    /**
     * @var int
     */
    public $lineNumber;
    /**
     * @var int
     */
    public $columnNumber;

    public function __construct(string $functionName, string $scriptId, string $url, int $lineNumber, int $columnNumber)
    {
        $this->functionName = $functionName;
        $this->scriptId = $scriptId;
        $this->url = $url;
        $this->lineNumber = $lineNumber;
        $this->columnNumber = $columnNumber;
    }
}
