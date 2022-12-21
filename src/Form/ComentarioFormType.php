<?php

namespace App\Form;

use App\Entity\ListaJuegos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ComentarioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comentario', null, [
                'label'=>'Escriba un comentario:',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Escriba un comnetario por favor.'
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListaJuegos::class,
        ]);
    }
}
