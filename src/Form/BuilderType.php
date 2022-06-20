<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class BuilderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
	        ->add('tradeType',
		        ChoiceType::class,
		        [
			        'choices' => ['NEP'=> 'nep', 'FABR' => 'fabr'],
			        'label' => 'choose trade :'
		        ],
	        )
	        ->add('submit', SubmitType::class, ['label' => 'apply'])
        ;
    }
}
