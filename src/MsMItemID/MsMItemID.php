<?php

namespace MsMItemID;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class MsMItemID extends PluginBase implements Listener {

    public function onLoad() : void {
        $this->getLogger()->info(TextFormat::WHITE . "Loaded");
    }

    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::DARK_GREEN . "Enabled");
    }

    public function onDisable() : void{
        $this->getLogger()->info(TextFormat::DARK_RED . "Disabled");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch(strtolower($command->getName())){
            case "iv":
                $player = $sender->getPlayer();
                $item = $player->getInventory()->getItemInHand();
                $player->sendMessage($item->getName() . " -> " . $item->getId() . ":" . $item->getDamage());
                return true;
            default:
                return false;
        }
    }
}

 ?>
