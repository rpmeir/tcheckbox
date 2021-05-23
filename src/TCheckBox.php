<?php
namespace Rpmeir\TCheckBox;

/**
 * TCheckBox
 *
 * @version    0.9.0
 * @package    tcheckbox
 * @author     Rodrigo Pires Meira
 */
class TCheckBox extends TField implements AdiantiWidgetInterface
{

    /**
     * Class Constructor
     * @param string $icon text Icon name
     * @param string $title text Title text
     * @param string $value text Value text
     * @param string $background text Background color class
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->id = 'tcheckbox_' . mt_rand(1000000000, 1999999999);
        $this->tag->{'type'} = 'checkbox';
        
        $this->setIcon($icon);
        $this->setTitle($title);
        $this->setValue($value);
        $this->setBackground($background);
    }

    /**
     * Show
     */
	public function show()
    {
                
    	parent::show();
    }
    
}