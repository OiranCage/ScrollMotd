<?php

namespace famima65536\DenkoMotd;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
	public function onEnable(): void{
		$task = new ScrollMotdTask($this->getServer()->getMotd());
		$this->getScheduler()->scheduleDelayedRepeatingTask($task, 20, 20);
	}
}