<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FactoryMethodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        foreach ($options['data'][0] as $key => $link)
        {
            $builder->add(
                'search_' . $key,
                TextType::class,
                ['required' => 0]
            );
        }

        $builder->add('send', SubmitType::class);
    }
}
