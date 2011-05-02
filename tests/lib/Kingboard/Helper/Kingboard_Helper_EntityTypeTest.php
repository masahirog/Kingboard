<?php

/**
 * Test class for Kingboard_Helper_EntityType.
 * Generated by PHPUnit on 2011-04-29 at 14:14:11.
 */
class Kingboard_Helper_EntityTypeTest extends PHPUnit_Framework_TestCase {

    public function entityIdsProvider() {
        return array(
            array(22778, 'deploy'),
            array(30188, 'npc'),
            array(30189, 'npc'),
            array(30190, 'npc'),
            array(2372, 'npc'),
            array(3591, 'npc'),
            array(9866, 'npc'),
            array(10013, 'npc'),
            array(10274, 'npc'),
            array(10273, 'npc'),
            array(27780, 'structure'),
            array(16213, 'structure'),
            array(16214, 'structure'),
            array(1001099324, 'char'),
            array(1688152550, 'char'),
            array(381786158, 'char'),
            array(1912582732, 'char'),
            array(0, 'na')
        );
    }

    /**
     *
     * @dataProvider entityIdsProvider
     */
    public function testGetEntityTypeByEntityId($id, $expected) {
        $actual = Kingboard_Helper_EntityType::getEntityTypeByEntityId($id);
        $this->assertEquals($expected, $actual, 'Failed asserting that ID ' . $id . ' is of type ' . $expected . ', type ' . $actual . ' detected');
    }

}
