<?php

namespace ToolsPE;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use ToolsPE\Commands\{NickCommand, UnnickCommand};
use ToolsPE\Events\PlayerQuit;

class Main extends PluginBase implements Listener
{
    
    public $instance;
    
    public function onEnable()
    {
        if(!$this->instance instanceof Main) $this->instance = $this;
        $this->registerEvents();
        $this->registerCommands();
        $this->getLogger()->info("ToolsPE enabled... Plugin made by Misteboss and LCraftPE !");
    }
    
    public static function getInstance()
    {
        return $this->instance;
    }
    
    private function registerEvents()
    {
        $this->getServer()->getPluginManager()->registerEvents(new PlayerQuit(), $this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    private function registerCommands()
    {
        $this->getServer()->getCommandMap()->register(new NickCommand(), $this);
        $this->getServer()->getCommandMap()->register(new UnnickCommand(), $this);
    }    
}
