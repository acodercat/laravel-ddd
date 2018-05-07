<?php

namespace App\Infrastructure\Persistence\Doctrine\Staff;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;



class StateType extends Type {
    
    protected $states = [\App\Domain\Model\PhysicalExamine\ApptState::class, \App\Domain\Model\PhysicalExamine\RegisterState::class, \App\Domain\Model\PhysicalExamine\CompleteExamineState::class]; 


   	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
        return "";
    }

   	public function getName() {
   		return 'state';
   	}

	public function convertToPHPValue($value, AbstractPlatform $platform) {
		
		foreach ($this->states as $key => $class) {
			if($value == $class::CODE) {
				return new $class();
			}
		}

    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
      foreach ($this->states as $key => $class) {
    		if($value instanceof $class) {
                return $class::CODE;
            }
		}

    }
    
}






