<?php
namespace Kingboard;
class KingboardMaintenanceTask extends \King23\Tasks\King23Task
{
    /**
     * documentation for the single tasks
     * @var array
     */
    protected $tasks = array(
        "info" => "General Informative Task",
        "setup_indexes" => "Setup the indexes for MongoDB",
    );

    /**
     * Name of the module
     */
    protected $name = "KingboardMaintenance";

    /**
     * setup all indexes for Kingboard
     * @param array $options
     * @return
     */
    public function setup_indexes(array $options)
    {
        if(count($options) != 0)
        {
            $this->cli->error('this task takes no arguments');
            return;
        }

        $reg = \King23\Core\Registry::getInstance();

        $this->cli->message("Setting Killmail_Kill indexes");

        // Kingboard_Kill indexes
        $col = $reg->mongo['db']->Kingboard_Kill;

        // idHash, index unique
        $col->ensureIndex(array('idHash' => 1), array("unique" => true));

        // victim Names
        $col->ensureIndex(array('victim.characterName' => 1));

        // attacker Names
        $col->ensureIndex(array('attackers.characterName' =>1));

        // victim ID
        $col->ensureIndex(array('victim.characterID' => 1));

        // attacker ID
        $col->ensureIndex(array('attackers.characterID' =>1 ));

        // corporation victim id
        $col->ensureIndex(array('victim.corporationID' =>1));

        // corporation attacker id
        $col->ensureIndex(array('attackers.corporationID' =>1));

        // corporation victim name
        $col->ensureIndex(array('victim.corporationName' =>1));

        // corporation attacker name
        $col->ensureIndex(array('attackers.corporationName' =>1));

        // alliance victim id
        $col->ensureIndex(arraY('victim.allianceID' =>1));

        // alliance attacker id
        $col->ensureIndex(array('attackers.allianceID' =>1));

        // alliance victim name
        $col->ensureIndex(array('victim.allianceName' =>1));

        // alliance attacker name
        $col->ensureIndex(array('attackers.allianceName' =>1));

		// faction victim id
        $col->ensureIndex(array('victim.factionID' =>1));

        // faction attacker id
        $col->ensureIndex(array('attackers.factionID' =>1));

        // faction victim name
        $col->ensureIndex(array('victim.factionName' =>1));

        // faction attacker name
        $col->ensureIndex(array('attackers.factionName' =>1));

        // indexes for the battle queries
        // battle kills
        $col->ensureIndex(array(
            'killTime' => 1,
            'location.solarSystem' => 1,
            'attackers.corporationID' => 1,
            'attackers.allianceID' => 1,
            'victim.corporationID' => 1,
            'victim.allianceID' => 1
        ), array('name' => 'battlequeries'));
        
        // battle losses
        $col->ensureIndex(array(
            'killTime' => 1,
            'location.solarSystem' => 1,
            'victim.corporationID' => 1,
            'victim.allianceID' => 1
        ), array('name'=> 'battlelosses'));
        
        // killtime Index
        $col->ensureIndex(array('killTime' => 1));

        // location.solarSystem
        $col->ensureIndex(array('location.solarSystem' => 1));

        $col->ensureIndex(array('killID' =>1));

        $this->cli->message("Setting Killmail_EveItem indexes");
        // Kingboard_EveItem
        $col = $reg->mongo['db']->Kingboard_EveItem;

        // typeID
        $col->ensureIndex(array('typeID' => 1), array('unique' => true));

        // typeName
        $col->ensureIndex(array('typeName' => 1));

        $this->cli->message("Setting Killmail_EveSolarSystem indexes");

        // Kingboard_EveSolarSystem
        $col = $reg->mongo['db']->Kingboard_EveSolarSystem;

        // itemID
        $col->ensureIndex(array('itemID' => 1), array('unique' => true));

        // itemName
        $col->ensureIndex(array('itemName' => 1));


    }
}