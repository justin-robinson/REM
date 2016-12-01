<?php

namespace DBCore\Rem;

use Scoop\Database\Model;

/**
 * Class Dreams
 * @package DBCore\Rem
 * @author jrobinson (robotically)
 * @date 2016/11/30
 * @property mixed $id
 * @property mixed $created_on
 * @property mixed $updated_at
 * @property mixed $dreamer_id
 * @property mixed $active
 * @property mixed $story
 * AUTO-GENERATED FILE
 * DO NOT EDIT THIS FILE BECAUSE IT WILL BE LOST
 * Put your code in DB\Rem\Dreams
 */
class Dreams extends Model {

    const SCHEMA = 'rem';
    const TABLE = 'dreams';
    const AUTO_INCREMENT_COLUMN = 'id';
    const PRIMARY_KEYS = 
        array (
          0 => 'id',
        );
    const NON_NULL_COLUMNS = 
        array (
          0 => 'id',
          1 => 'created_on',
          2 => 'updated_at',
          3 => 'dreamer_id',
          4 => 'active',
          5 => 'story',
        );

    public static $dBColumnPropertiesArray = 
        array (
          'id' => 
          array (
            0 => 1,
            1 => 0,
          ),
          'created_on' => 
          array (
          ),
          'updated_at' => 
          array (
          ),
          'dreamer_id' => 
          array (
          ),
          'active' => 
          array (
          ),
          'story' => 
          array (
          ),
        );
    public static $dBColumnDefaultValuesArray = 
        array (
          'id' => NULL,
          'created_on' => 'CURRENT_TIMESTAMP',
          'updated_at' => '0000-00-00 00:00:00',
          'dreamer_id' => NULL,
          'active' => '1',
          'story' => NULL,
        );

}

?>