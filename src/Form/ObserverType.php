<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObserverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'var1',
                IntegerType::class
            )
            ->add(
                'var2',
                IntegerType::class
            )
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'send'
                ]
            )
        ;
    }
}
