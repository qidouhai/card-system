<?php
 namespace Symfony\Component\VarDumper\Caster; class FrameStub extends EnumStub { public $keepArgs; public $inTraceStub; public function __construct(array $frame, $keepArgs = true, $inTraceStub = false) { $this->value = $frame; $this->keepArgs = $keepArgs; $this->inTraceStub = $inTraceStub; } } 