<?php

namespace App\Form;

use App\Entity\ShortURL;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class ShortURLType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('originalUrl', UrlType::class, [
                'label' => 'Introduce una URL',
                'required' => false,
                'constraints' => [
                    new Url([
                        'message' => 'Por favor, introduce una URL válida.',
                    ]),
                    new NotBlank([
                        'message' => 'Tiene que introducir una URL.',
                    ]),
                    new Length([
                        'max' => 4000,
                        'maxMessage' => 'La URL no puede superar los 4000 caracteres.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShortURL::class,
        ]);
    }
}
