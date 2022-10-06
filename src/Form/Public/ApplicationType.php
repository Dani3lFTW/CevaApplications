<?php

namespace App\Form\Public;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder

            ->add('name', TextType::class, [
                'required' => $options['require_name']
            ])
            ->add('discord', TextType::class, [
                'required' => $options['require_discord']
            ])
            ->add('age', NumberType::class)
            ->add('email', EmailType::class, [
                'required' => $options['require_email']
            ])
            ->add('about', TextType::class, [
                'required' => $options['require_about']
            ])
            ->add('qualities', TextType::class, [
                'required' => $options['require_qualities']
            ])
            ->add('comments', TextType::class, [
                'required' => false
            ])
            ->add('save', SubmitType::class, ['label' => 'Trimite']);
    }

    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([

            'require_name' => true,
            'require_discord' => true,
            'require_age' => true,
            'require_email' => true,
            'require_about' => true,
            'require_qualities' => true,
            'require_comments' => false,

        ]);

    }


}