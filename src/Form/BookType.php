<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Résumé',
            ])
            ->add('firstEdition', IntegerType::class, [
                'label' => '1ère édition',
            ])
            ->add('kind', TextType::class, [
                'label' => 'Genre',
            ])
            ->add('numberPages', IntegerType::class, [
                'label' => 'Nombre de pages',
            ])
            ->add('advice', TextareaType::class, [
                'label' => 'Avis',
            ])
            ->add('picture', TextType::class, [
                'label' => 'Image',
            ])
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'firstLastname',
                'multiple' => false,
                'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
