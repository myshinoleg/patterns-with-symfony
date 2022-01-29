<?php

namespace App\Form;

use App\Patterns\Behavioral\Strategy\TradeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatternsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
	        ->add('tradeType',
		        ChoiceType::class,
		        [
					'choices' => [TradeType::TYPE_SALE, TradeType::TYPE_BUY],
					'label' => 'choose trade type:'
		        ],
	        )
            ->add(
				'submit',
				SubmitType::class,
	            [
					'label' => 'get trade list'
	            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
