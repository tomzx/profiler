<?php

namespace tomzx\Profiler;

use tomzx\Profiler\Runtime\CallFrame;

class StackBasedProfiler
{
    private $lastTick;
    private $profile;
    private $stack = [];

    public function start()
    {
        $this->lastTick = microtime(true);
        $this->profile = new Profile();
        $this->profile->startTime = $this->getMicroseconds($this->lastTick);

        $rootProfileNode = new ProfileNode();
        $rootProfileNode->callFrame = new CallFrame('(root)', 0, '', -1, -1);
        $this->profile->nodes[] = $rootProfileNode;
        $this->stack[] = $rootProfileNode;
    }

    public function stop(): Profile
    {
        $this->profile->endTime = $this->getMicroseconds(microtime(true));
        return $this->profile;
    }

    public function push($name)
    {
        $tick = microtime(true);

        $profileNode = new ProfileNode();

        $callFrame = new CallFrame($name, 0, '', -1, -1);

        $profileNode->callFrame = $callFrame;
        ++$profileNode->hitCount;

        /** @var \tomzx\Profiler\ProfileNode $parent */
        $parent = end($this->stack);
        $this->profile->nodes[] = $profileNode;
        $this->profile->samples[] = $profileNode->id;
        $this->profile->timeDeltas[] = $this->getMicroseconds($tick - $this->lastTick);
        $this->lastTick = $tick;

        $parent->children[] = $profileNode->id;

        $this->stack[$name] = $profileNode;
    }

    public function pop()
    {
        array_pop($this->stack);
    }

    private function getMicroseconds($time): int
    {
        return (int)(($time) * 10 ** 6);
    }
}
