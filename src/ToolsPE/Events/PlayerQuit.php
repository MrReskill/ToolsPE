<?php

namespace ToolsPE\Events;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use ToolsPE\BaseFiles\Nick;

class PlayerQuit implements Listener
{

    public function onQuit(PlayerQuitEvent $event)
    {
        $nick = new Nick($event->getPlayer());
        if($nick->getNick() !== "ERROR")
        {
            $nick->reset();
        }  
    }
}
