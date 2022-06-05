<?php

namespace App\Form;

use App\Entity\Post;
// use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none mb-7',
                    'placeholder' => 'Enter a title for the blog post'
                )
            ])

            ->add('author', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none mb-7',
                    'placeholder' => 'Enter name of author'
                )
            ])

            ->add('subject', TextType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none mb-7',
                    'placeholder' => 'Enter an optional subject heading'
                )
            ])

            ->add('date', null, [
                'widget' => 'single_text',
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-10 text-2xl outline-none mb-7',
                    'placeholder' => 'Enter a date and time'
                ),
                'label' => 'Posted at (date/ time)'
            ])

            ->add('body', TextareaType::class, [
                'attr' => array(
                    'class' => 'bg-transparent block border-b-2 w-full h-60 text-2xl outline-none mb-7',
                    'placeholder' => 'Enter the main body text of the blog post'
                )
            ])

            ->add('imagePath', FileType::class, array(
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'class' => 'py-2 block'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
