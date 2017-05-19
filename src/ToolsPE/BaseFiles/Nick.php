<?php

namespace ToolsPE\BaseFiles;

use ToolsPE\Main;

class Nick
{
    
    private $player, $name, $nicks;
    
    public function __construct(Player $player)
    {
        $this->player = $player;
        $this->name = $player->getName();
        $this->nicks = Main::getInstance()->nicks;
        $this->skins = Main::getInstance()->skins;
    }
    
    public function reset()
    {
        $this->player->setDisplayName($this->name);
        $this->player->setNameTag($this->name);
        $this->player->despawnFromAll();
        $this->player->setSkin($this->skins[$this->name]["Old"][0], $this->skins[$this->name]["Old"][1]);
        $this->player->spawnToAll();
        unset($this->skins[$this->name], $this->nicks[$this->name]);
    }
    
    public function isNick() : bool
    {
        return (isset($this->nicks[$this->name])) ? true : false;
    }
    
    public function getNick() : string
    {
        return $this->nicks[$this->name] ?? "ERROR";
    }
    
    public function setNick()
    {
        $nicks = ['VipGames'.'MCPE_Nicht', 'DrogenEye', 'DBEa', 'TheFas2P', 'xpypypy', 'MrTee', 'GGGamer', 'depp123', 'Pupsblue', 'Gommwaffl', 'BestHDMik', 'BubugagaLp', 'Optimus10', 'EzImMax', 'CuzImSkill', 'NebzFreak', 'CowLer', 'Elexieres', 'Freesionce', 'Wicess', 'MarieXNice', 'IronedPvP', 'Likepvez', 'Freezestyler', 'H4xvr', 'MaxIsLikes', 'Bluenchen', 'XxPvPlerXX', 'Madienblack', 'PPAP', 'HitsLikesX', 'ItzJusteZ', 'RlyBestPvP110', 'Com3back', 'Hell0W0rld', 'ItzJustin', 'Bedip2003', 'Bahmutshari20', 'BigManofMCPE', 'Qwertz123', 'Skywarsgamer7', 'ItzOPPvE', 'Kuhlman77'];
        $this->nicks[$this->name] = $nicks[array_rand($nicks)];
        $this->player->setDisplayName($this->nicks[$this->name]);
        $this->player->setNameTag($this->nicks[$this->name]);
    }
    
    public function getOldSkin() : array
    {
        return $this->skins[$this->name]["Old"];
    }
    
    public function getNewSkin() : array
    {
        return $this->skins[$this->name]["New"];
    }
    
    public function setSkin()
    {
        $players = Main::getInstance()->getServer()->getOnlinePlayers();
        $this->skins[$this->name] = ["Old" => [$this->player->getSkinData(), $this->player->getSkinId()],
                                     "New" => [$players[array_rand($players)]->getSkinData(), $players[array_rand($players)]->getSkinId()]];
        $this->player->despawnFromAll();
        $this->player->setSkin($this->skins[$this->name]["New"][0], $this->skins[$this->name]["New"][1]);
        $this->player->spawnToAll();
    }
}
