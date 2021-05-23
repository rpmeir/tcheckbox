<?php
namespace Rpmeir\TCheckBox;

use Exception;

/**
 * Database Checkbox Widget
 *
 * @version    0.9.0
 * @package    tcheckbox
 * @author     Rodrigo Pires Meira
 */
class TDBCheckBox extends TCheckBox
{
    protected $service;
    private $database;
    private $model;
    private $column;
    
    /**
     * Class Constructor
     * @param  $name     widget's name
     * @param  $database database name
     * @param  $model    model class name
     * @param  $value    table field to be listed in the combo
     * @param  $ordercolumn column to order the fields (optional)
     * @param  $criteria criteria (TCriteria object) to filter the model (optional)
     */
    public function __construct($name, $database, $model)
    {
        // executes the parent class constructor
        parent::__construct($name);
        
        if (empty($database))
        {
            throw new Exception(AdiantiCoreTranslator::translate('The parameter (^1) of ^2 is required', 'database', __CLASS__));
        }
        
        if (empty($model))
        {
            throw new Exception(AdiantiCoreTranslator::translate('The parameter (^1) of ^2 is required', 'model', __CLASS__));
        }
        
        $this->database = $database;
        $this->model = $model;
        $this->service = 'AdiantiCheckBoxService'; // todo
    }
    
    /**
     * Define the service class name
     * @param string $service Service class name
     */
    public function setService($service)
    {
        $this->service = $service;
    }
    
    /**
     * Shows the widget
     */
    public function show()
    {
        parent::show();
        
        $seed = APPLICATION_NAME.'s8dkld83kf73kf094';
        $hash = md5("{$seed}{$this->database}{$this->column}{$this->model}");
        $length = $this->minLength;
        
        $class = $this->service;
        $callback = array($class, 'onChange'); // todo 
        $method = $callback[1];
        $url = "engine.php?class={$class}&method={$method}&static=1&database={$this->database}&column={$this->column}&model={$this->model}&hash={$hash}";
        
        TScript::create(" tdbentry_start( '{$this->name}', '{$url}' );");
    }
}