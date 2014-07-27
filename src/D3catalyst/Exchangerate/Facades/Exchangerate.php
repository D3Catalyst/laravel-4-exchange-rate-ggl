<?php 
 
namespace D3Catalyst\Exchangerate\Facades;
 
use Illuminate\Support\Facades\Facade;
/**
*  Class Facade Exchangerate.
*
*
*  @author Ricardo Madrigal <soporte@d3catalyst.com>
*/
class Exchangerate extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() 
    { 
        return 'exchangerate'; 
    }
 
}