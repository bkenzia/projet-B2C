<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=>[
                    'placeholder'=>"Nom",
                ],
                'label' => false,
                ])
            ->add('email', EmailType::class, [
                'attr'=>[
                    'placeholder'=>"Email",
                ],
                'label' => false,
            ])
            ->add('message', TextareaType::class, [
                'attr'=>[
                    'placeholder'=>"Ecriver votre message ...",
                    'cols'=>"31",
                    'rows'=>"5",
                ],
                'label' => false,
            ])
            ->add('envoyer', SubmitType::class, [
                "attr"=>[
                    'value'=>"Envoyer",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
