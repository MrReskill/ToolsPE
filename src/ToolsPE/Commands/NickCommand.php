<?php
namespace ToolsPE\Commands;

use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;

class NickCommand extends Command
{
    
    public function __construct()
    {
        parent::__construct("nick", "Get a random nick", "/nick");
        $this->setPermission("nick.cmd");
    }
    
    public function execute(CommandSender $sender, $currentAlias, array $args)
    {
        if(count($args) === 0)
        {
            if($sender instanceof Player)
            {
                $nick = new Nick($sender);
                $nick->setNick();
                $nick->setSkin();
                $sender->sendMessage("§7Your nick has been changed...");
            }
            else
            {
                $sender->sendMessage("§fYou must run this command in game.");
            }
        }
        else
        {
            $sender->sendMessage("§cAn error has occurred, please use: /nick.");
        }
    }
}
