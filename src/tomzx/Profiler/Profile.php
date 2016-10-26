<?php

namespace tomzx\Profiler;

class Profile
{
    /**
     * @var array<\tomzx\Profiler\ProfileNode>
     */
    public $nodes = [];
    /**
     * @var float
     */
    public $startTime;
    /**
     * @var float
     */
    public $endTime;
    /**
     * @var array<int>
     */
    public $samples = [];
    /**
     * @var array<int>
     */
    public $timeDeltas = [];
}
