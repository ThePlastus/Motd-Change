<?php

namespace motd;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use motd\Main;


class Main extends PluginBase implements Listener {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getServer()->getLogger()->info("§7==========================");
		$this->getServer()->getLogger()->info("§9> §aMotdChange §8[§aLoading§8]");
		$this->getServer()->getLogger()->info("§7==========================");
		$this->getServer()->getNetwork()->setName("My default motd");
	}
	
	public function onDisable(){
		$this->getServer()->getLogger()->info("§7==========================");
		$this->getServer()->getLogger()->info("§9> §cMotdChange §8[§cDisabled§8]");
		$this->getServer()->getLogger()->info("§7==========================");
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		if($command->getName() == "motd"){
			$name = "§aMy Server Name";
			if(!isset($args[0])){
				$sender->sendMessage("§8[§aMotd§8] §7Use: §a/motd random/custom");
				return true;
			}else{
				if($args[0] == "random"){
					if(!isset($args[1])){
						switch(mt_rand(1,5)){
							case 1:
							$this->getServer()->getNetwork()->setName("§9» §aThe §bBest §6Server !");
							break;
							case 2:
							$this->getServer()->getNetwork()->setName("§9» $name join now !");
							break;
							case 3:
							$this->getServer()->getNetwork()->setName("example 3");
							break;
							case 4:
							$this->getServer()->getNetwork()->setName("example 4");
							break;
							case 5:
							$this->getServer()->getNetwork()->setName("example 5");
							break;
						}
						return true;
					}else{
						$sender->sendMessage("§8[§aMotd§8] §7Use: §a/motd random");
						return true;
					}
				}
				if($args[0] == "custom"){
					if(isset($args[1])){
						$text = $args[1];
						$this->getServer()->getNetwork()->setName($text);
						return true;
					}else{
						$sender->sendMessage("§8[§aMotd§8] §7Use: §a/motd custom <text>");
						return true;
					}
				}
			}
		}
	}
}

