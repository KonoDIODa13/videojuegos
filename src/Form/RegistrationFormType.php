<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    // Lo primero que haccemos es crear aquellos campos que queremos que aparezcan en el form. Todos ellos tienen que 
    // ser campos de la entidad con la que estamos haciendo el form en este caso, es de usuario.
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', null, [
                'label' => 'Nombre de usuario:',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Escriba un nombre de usuario por favor'
                    ]),
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Contraseña:',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Escriba una contraseña por favor.',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Su contraseña a de tener como mínimo de 6 caracteres.',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Repite la contraseña:',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Escriba una contraseña por favor.',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Su contraseña a de tener como mínimo de 6 caracteres.',
                        'max' => 4096,
                    ]),
                ],
            ]); 

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
