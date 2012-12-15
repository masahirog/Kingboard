<?php
namespace Kingboard\Views;
class Kill extends \Kingboard\Views\Base
{
    public function index($request)
    {
        $context = array();
        $context['killdata'] = \Kingboard\Model\Kill::getByKillId($request['killID']);
        foreach($context['killdata']['attackers'] as $attacker)
        {
            if(!isset($stats[$attacker['allianceName']]))
                $stats[$attacker['allianceName']] = array();
            if(!isset($stats[$attacker['allianceName']][$attacker['corporationName']]))
                $stats[$attacker['allianceName']][$attacker['corporationName']] = 0;
            $stats[$attacker['allianceName']][$attacker['corporationName']]++;
        }
        ksort($stats);
        $context['stats'] = $stats;
        return $this->render('kill.html', $context);
    }

    public function json($request) 
    {
         $kill = \Kingboard\Model\Kill::getByKillId($request['killID']);
         echo json_encode($kill->toArray());
    }

}
