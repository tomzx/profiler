<?php

namespace tomzx\Profiler;

class ProfileNode
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var \tomzx\Profiler\Runtime\CallFrame
     */
    public $callFrame;
    /**
     * @var int
     */
    public $hitCount = 0;
    /**
     * @var array<int>
     */
    public $children = [];
    /**
     * @var string
     */
    public $deoptReason;
    /**
     * @var array<\tomzx\Profiler\ProfileTickInfo>
     */
    public $positionTicks = [];
    /**
     * @var int
     */
    public static $currentId = 0;

    public function __construct()
    {
        $this->id = ++self::$currentId;
    }
}
