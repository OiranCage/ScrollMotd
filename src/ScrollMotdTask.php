<?php

namespace famima65536\DenkoMotd;

use pocketmine\network\query\QueryInfo;
use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\utils\MainLogger;

class ScrollMotdTask extends Task {

	public function __construct(
		private string $motd,
		private int $size = 1
	){
		$this->motd .= " §r§f";
	}

	/**
	 * @inheritDoc
	 */
	public function onRun(): void{
		$stringArray = mb_str_split($this->motd, $this->size);
		$first = array_shift($stringArray);
		array_push($stringArray, $first);
		$this->motd = join("", $stringArray);
		Server::getInstance()->getNetwork()->setName($this->motd);
	}
}