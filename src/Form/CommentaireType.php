<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('auteur', TextType::class, [
                'attr'=>[
                    'placeholder'=>"auteur",
                ],
                'label' => false,
                ])
            ->add('email', EmailType::class, [
                'attr'=>[
                    'placeholder'=>"Email",
                ],
                'label' => false,
            ])
            ->add('contenu', TextareaType::class, [
                'attr'=>[
                    'placeholder'=>"Ecriver votre commentaire ...",
                    'cols'=>"21",
                    'rows'=>"5",
                ],
                'label' => false,
            ])
            ->add('Soumetre', SubmitType::class)
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
