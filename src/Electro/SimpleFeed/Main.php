<?php

declare(strict_types=1);

namespace Electro\SimpleFeed;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
          public function onCommand(CommandSender $sender,Command $cmd,string $label,array $args) : bool{
           if ($sender instanceof Player) {
               if ($cmd->getName() == "feed") {
                   if (isset($args[0])){
                       $player = $this->getServer()->getPlayer($args[0]);
                       if ($player){
                           $player->setFood(20);
                           $player->sendMessage("§aYou Have Been Fed!");
                           $sender->sendMessage("§aYou Have Fed " . $player . "!");
                       }
                       else{
                           $sender->sendMessage("§cThis player does not exist");
                       }
                   }
                   else {
                       $sender->setFood(20);
                       $sender->sendMessage("§aYou Have Been Fed!");
                   }
               }
           }
           else{
               $sender->sendMessage("§cYou must be in-game to use this command!");
           }
          return true;

		}

}
