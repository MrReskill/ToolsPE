<?php
namespace ToolsPE\Commands;

use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;

class UnnickCommand extends Command
{
    
    public function __construct()
    {
        parent::__construct("unnick", "Delete your nick", "/unnick");
        $this->setPermission("unnick.cmd");
    }
    
    public function execute(CommandSender $sender, $currentAlias, array $args)
    {
        if(count($args) === 0)
        {
            if($sender instanceof Player)
            {
                $nick = new Nick($sender);
                if($nick->getNick() !== "ERROR")
                {
                    $nick->reset();
                    $sender->sendMessage("§7Your nick has been deleted...");
                }
            }
            else
            {
                $sender->sendMessage("§cYou must run this command in game.");
            }
        }
        else
        {
            $sender->sendMessage("§cAn error has occurred, please use: /unnick.");
        }
    }
}
